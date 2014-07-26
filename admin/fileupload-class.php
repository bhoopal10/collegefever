<?php
class uploader {

        var $file;
        var $path;
        var $language;
        var $acceptable_file_types;
        var $error;
        var $errors; // Depreciated (only for backward compatability)
        var $accepted;
        var $max_filesize;
        var $max_image_width;
        var $max_image_height;


        /**
         * object uploader ([string language]);
         * 
         * Class constructor, sets error messaging language preference
         * 
         * @param language                (string) defaults to en (English).
         * 
         * @examples:        $f = new uploader();                 // English error messages
         *
         */
        function uploader ( $language = 'en' ) {
                $this->language = strtolower($language);
                $this->error   = '';
        }
        
        
        /**
         * void max_filesize ( int size);
         * 
         * Set the maximum file size in bytes ($size), allowable by the object.
         * NOTE: PHP's configuration file also can control the maximum upload size, which is set to 2 or 4 
         * megs by default. To upload larger files, you'll have to change the php.ini file first.
         * 
         * @param size                         (int) file size in bytes
         * 
         */
        function max_filesize($size){
                $this->max_filesize = (int) $size;
        }


        /**
         * void max_image_size ( int width, int height );
         * 
         * Sets the maximum pixel dimensions. Will only be checked if the 
         * uploaded file is an image
         * 
         * @param width                        (int) maximum pixel width of image uploads
         * @param height                (int) maximum pixel height of image uploads
         * 
         */
        function max_image_size($width, $height){
                $this->max_image_width  = (int) $width;
                $this->max_image_height = (int) $height;
        }
        
        
        /**
         * bool upload (string filename[, string accept_type[, string extension]]);
         * 
         * Checks if the file is acceptable and uploads it to PHP's default upload diretory
         * 
         * @param filename                (string) form field name of uploaded file
         * @param accept_type             (string) acceptable mime-types
         * @param extension               (string) default filename extenstion
         * 
         */
        function upload($filename='', $accept_type='', $extention='') {
                
                $this->acceptable_file_types = trim($accept_type); // used by error messages
                
                if (!isset($_FILES) || !is_array($_FILES[$filename]) || !$_FILES[$filename]['name']) {
                        $this->error = $this->get_error(0);
                        $this->accepted  = FALSE;
                        return FALSE;
                }
                                
                // Copy PHP's global $_FILES array to a local array
                $this->file = $_FILES[$filename];
                $this->file['file'] = $filename;
                
                // Initialize empty array elements
                if (!isset($this->file['extention'])) $this->file['extention'] = "";
                if (!isset($this->file['type']))      $this->file['type']      = "";
                if (!isset($this->file['size']))      $this->file['size']      = "";
                if (!isset($this->file['width']))     $this->file['width']     = "";
                if (!isset($this->file['height']))    $this->file['height']    = "";
                if (!isset($this->file['tmp_name']))  $this->file['tmp_name']  = "";
                if (!isset($this->file['raw_name']))  $this->file['raw_name']  = "";
                                
                // test max size
                if($this->max_filesize && ($this->file["size"] > $this->max_filesize)) {
                        $this->error = $this->get_error(1);
                        $this->accepted  = FALSE;
                        return FALSE;
                }
                
                if(stristr($this->file["type"], "image")) {
                        
                        /* IMAGES */
                        $image = getimagesize($this->file["tmp_name"]);
                        $this->file["width"]  = $image[0];
                        $this->file["height"] = $image[1];
                        
                        // test max image size
                        if(($this->max_image_width || $this->max_image_height) && (($this->file["width"] > $this->max_image_width) || ($this->file["height"] > $this->max_image_height))) {
                                $this->error = $this->get_error(2);
                                $this->accepted  = FALSE;
                                return FALSE;
                        }
                        // Image Type is returned from getimagesize() function
                        switch($image[2]) {
                                case 1:
                                        $this->file["extention"] = ".gif"; break;
                                case 2:
                                        $this->file["extention"] = ".jpg"; break;
                                case 3:
                                        $this->file["extention"] = ".png"; break;
                                case 4:
                                        $this->file["extention"] = ".swf"; break;
                                case 5:
                                        $this->file["extention"] = ".psd"; break;
                                case 6:
                                        $this->file["extention"] = ".bmp"; break;
                                case 7:
                                        $this->file["extention"] = ".tif"; break;
                                case 8:
                                        $this->file["extention"] = ".tif"; break;
								case 2:
                                        $this->file["extention"] = ".pdf"; break;
                                default:
                                        $this->file["extention"] = $extention; break;
                        }
                } elseif(!ereg("(\.)([a-z0-9]{3,5})$", $this->file["name"]) && !$extention) {
                        // Try and autmatically figure out the file type
                        // For more on mime-types: http://httpd.apache.org/docs/mod/mod_mime_magic.html
                        switch($this->file["type"]) {
                                case "text/plain":
                                        $this->file["extention"] = ".txt"; break;
                                case "text/richtext":
                                        $this->file["extention"] = ".txt"; break;
                                default:
                                        break;
                        }
                } else {
                        $this->file["extention"] = $extention;
                }
                
                // check to see if the file is of type specified
                if($this->acceptable_file_types) {
                        if(trim($this->file["type"]) && (stristr($this->acceptable_file_types, $this->file["type"]) || stristr($this->file["type"], $this->acceptable_file_types)) ) {
                                $this->accepted = TRUE;
                        } else { 
                                $this->accepted = FALSE;
                                $this->error = $this->get_error(3);
                        }
                } else { 
                        $this->accepted = TRUE;
                }
                
                return (bool) $this->accepted;
        }


        /**
         * bool save_file ( string path[, int overwrite_mode] );
         * 
         * Cleans up the filename, copies the file from PHP's temp location to $path, 
         * and checks the overwrite_mode
         * 
         * @param path                                (string) File path to your upload directory
         * @param overwrite_mode        (int)         1 = overwrite existing file
         *                                            2 = rename if filename already exists (file.txt becomes file_copy0.txt)
         *                                            3 = do nothing if a file exists
         * 
         */
        function save_file($path, $overwrite_mode="3"){
                if ($this->error) {
                        return false;
                }
                
                if (strlen($path)>0) {
                        if ($path[strlen($path)-1] != "/") {
                                $path = $path . "/";
                        }
                }
                $this->path = $path;        
                $copy       = "";        
                $n          = 1;        
                $success    = false;        
                                
                if($this->accepted) {
                        // Clean up file name (only lowercase letters, numbers and underscores)
                        $this->file["name"] = ereg_replace("[^a-z0-9._]", "", str_replace(" ", "_", str_replace("%20", "_", strtolower($this->file["name"]))));
                        
                        // Clean up text file breaks
                        if(stristr($this->file["type"], "text")) {
                                $this->cleanup_text_file($this->file["tmp_name"]);
                        }
                        
                        // get the raw name of the file (without its extenstion)
                        if(ereg("(\.)([a-z0-9]{2,5})$", $this->file["name"])) {
                                $pos = strrpos($this->file["name"], ".");
                                if(!$this->file["extention"]) { 
                                        $this->file["extention"] = substr($this->file["name"], $pos, strlen($this->file["name"]));
                                }
                                $this->file['raw_name'] = substr($this->file["name"], 0, $pos);
                        } else {
                                $this->file['raw_name'] = $this->file["name"];
                                if ($this->file["extention"]) {
                                        $this->file["name"] = $this->file["name"] . $this->file["extention"];
                                }
                        }
                        
                        switch((int) $overwrite_mode) {
                                case 1: // overwrite mode
                                        if (@copy($this->file["tmp_name"], $this->path . $this->file["name"])) {
                                                $success = true;
                                        } else {
                                                $success     = false;
                                                $this->error = $this->get_error(5);
                                        }
                                        break;
                                case 2: // create new with incremental extention
                                        while(file_exists($this->path . $this->file['raw_name'] . $copy . $this->file["extention"])) {
                                                $copy = "_copy" . $n;
                                                $n++;
                                        }
                                        $this->file["name"]  = $this->file['raw_name'] . $copy . $this->file["extention"];
                                        if (@copy($this->file["tmp_name"], $this->path . $this->file["name"])) {
                                                $success = true;
                                        } else {
                                                $success     = false;
                                                $this->error = $this->get_error(5);
                                        }
                                        break;
                                default: // do nothing if exists, highest protection
                                        if(file_exists($this->path . $this->file["name"])){
                                                $this->error = $this->get_error(4);
                                                $success     = false;
                                        } else {
                                                if (@copy($this->file["tmp_name"], $this->path . $this->file["name"])) {
                                                        $success = true;
                                                } else {
                                                        $success     = false;
                                                        $this->error = $this->get_error(5);
                                                }
                                        }
                                        break;
                        }
                        
                        if(!$success) { unset($this->file['tmp_name']); }
                        return (bool) $success;
                } else {
                        $this->error = $this->get_error(3);
                        return FALSE;
                }
        }
        
        
        /**
         * string get_error(int error_code);
         * 
         * Gets the correct error message for language set by constructor
         * 
         * @param error_code                (int) error code
         * 
         */
        function get_error($error_code='') {
                $error_message = array();
                $error_code    = (int) $error_code;
                
                switch ( $this->language ) {
                        // French (fr)
                        case 'fr':
                                $error_message[0] = "Aucun fichier n'a &eacute;t&eacute; envoy&eacute;";
                                $error_message[1] = "Taille maximale autoris&eacute;e d&eacute;pass&eacute;e. Le fichier ne doit pas &ecirc;tre plus gros que " . $this->max_filesize/1000 . " Ko (" . $this->max_filesize . " octets).";
                                $error_message[2] = "Taille de l'image incorrecte. L'image ne doit pas d&eacute;passer " . $this->max_image_width . " pixels de large sur " . $this->max_image_height . " de haut.";
                                $error_message[3] = "Type de fichier incorrect. Seulement les fichiers de type " . str_replace("|", " or ", $this->acceptable_file_types) . " sont autoris&eacute;s.";
                                $error_message[4] = "Fichier '" . $this->path . $this->file["name"] . "' d&eacute;j&aacute; existant, &eacute;crasement interdit.";
                                $error_message[5] = "La permission a ni&eacute;. Incapable pour copier le fichier &aacute; '" . $this->path . "'";
                        break;
                        
                        // German (de)
                        case 'de':
                                $error_message[0] = "Es wurde keine Datei hochgeladen";
                                $error_message[1] = "Maximale Dateigr&ouml;sse &uuml;berschritten. Datei darf nicht gr&ouml;sser als " . $this->max_filesize/1000 . " KB (" . $this->max_filesize . " bytes) sein.";
                                $error_message[2] = "Maximale Bildgr&ouml;sse &uuml;berschritten. Bild darf nicht gr&ouml;sser als " . $this->max_image_width . " x " . $this->max_image_height . " pixel sein.";
                                $error_message[3] = "Nur " . str_replace("|", " oder ", $this->acceptable_file_types) . " Dateien d&uuml;rfen hochgeladen werden.";
                                $error_message[4] = "Datei '" . $this->path . $this->file["name"] . "' existiert bereits.";
                                $error_message[5] = "Erlaubnis hat verweigert. Unf&amul;hig, Akte zu '" . $this->path . "'";
                        break;

                        // Dutch (nl)
                        case 'nl':
                                $error_message[0] = "Er is geen bestand geupload";
                                $error_message[1] = "Maximum bestandslimiet overschreden. Bestanden mogen niet groter zijn dan " . $this->max_filesize/1000 . " KB (" . $this->max_filesize . " bytes).";
                                $error_message[2] = "Maximum plaatje omvang overschreven. Plaatjes mogen niet groter zijn dan " . $this->max_image_width . " x " . $this->max_image_height . " pixels.";
                                $error_message[3] = "Alleen " . str_replace("|", " of ", $this->acceptable_file_types) . " bestanden mogen worden geupload.";
                                $error_message[4] = "Bestand '" . $this->path . $this->file["name"] . "' bestaat al.";
                                $error_message[5] = "Toestemming is geweigerd. Kon het bestand niet naar '" . $this->path . "' copieren.";
                                //$error_message[5] = "Toestemming ontkende. Onbekwaam dossier aan '" . $this->path . "'";
                        break;

                        // Italian (it)
                        case 'it':
                                $error_message[0] = "Il file non e' stato salvato";
                                $error_message[1] = "Il file e' troppo grande. La dimensione massima del file e' " . $this->max_filesize/1000 . " Kb (" . $this->max_filesize . " bytes).";
                                $error_message[2] = "L'immagine e' troppo grande. Le dimensioni massime non possono essere superiori a " . $this->max_image_width . " pixel di larghezza per " . $this->max_image_height . " d'altezza.";
                                $error_message[3] = "Il tipo di file non e' valido. Solo file di tipo " . str_replace("|", " o ", $this->acceptable_file_types) . " sono autorizzati.";
                                $error_message[4] = "E' gia' presente un file con nome " . $this->path . $this->file["name"];
                                $error_message[5] = "Permesso negato. Impossibile copiare il file in '" . $this->path . "'";
                        break;

                          // Finnish
                        case 'fi':
                                $error_message[0] = "Tiedostoa ei l&amul;hetetty.";
                                $error_message[1] = "Tiedosto on liian suuri. Tiedoston koko ei saa olla yli " . $this->max_filesize/1000 . " KB (" . $this->max_filesize . " tavua).";
                                $error_message[2] = "Kuva on liian iso. Kuva ei saa olla yli " . $this->max_image_width . " x " . $this->max_image_height . " pikseli&amul;.";
                                $error_message[3] = "Vain " . str_replace("|", " tai ", $this->acceptable_file_types) . " tiedostoja voi tallentaa kuvapankkiin.";
                                $error_message[4] = "Tiedosto '" . $this->path . $this->file["name"] . "' on jo olemassa.";
                                $error_message[5] = "Ei k&amul;ytt&ouml;oikeutta. Tiedostoa ei voi kopioida hakemistoon '" . $this->path . "'";
                        break;

                         // Spanish
                        case 'es':
                                $error_message[0] = "No se subi&oacute; ning&uacute;n archivo.";
                                $error_message[1] = "Se excedi&oacute; el tama&ntilde;o m&aacute;ximo del archivo. El archivo no puede ser mayor a " . $this->max_filesize/1000 . " KB (" . $this->max_filesize . " bytes).";
                                $error_message[2] = "Se excedieron las dimensiones de la imagen. La imagen no puede medir m&aacute;s de " . $this->max_image_width . " (w) x " . $this->max_image_height . " (h) pixeles.";
                                $error_message[3] = "El tipo de archivo no es v&aacute;lido. S&oacute;lo los archivos " . str_replace("|", " o ", $this->acceptable_file_types) . " son permitidos.";
                                $error_message[4] = "El archivo '" . $this->path . $this->file["name"] . "' ya existe.";
                                $error_message[5] = "Permiso denegado. No es posible copiar el archivo a '" . $this->path . "'";
                        break;                

                        // Norwegian
                        case 'no':
                                $error_message[0] = "Ingen fil ble lastet opp.";
                                $error_message[1] = "Max filst&oslash;rrelse ble oversteget. Filen kan ikke v�re st&oslash;rre ennn " . $this->max_filesize/1000 . " KB (" . $this->max_filesize . " byte).";
                                $error_message[2] = "Max bildest&oslash;rrelse ble oversteget. Bildet kan ikke v�re st&oslash;rre enn " . $this->max_image_width . " x " . $this->max_image_height . " piksler.";
                                $error_message[3] = "Bare " . str_replace("|", " tai ", $this->acceptable_file_types) . " kan lastes opp.";
                                $error_message[4] = "Filen '" . $this->path . $this->file["name"] . "' finnes fra f&oslash;r.";
                                $error_message[5] = "Tilgang nektet. Kan ikke kopiere filen til '" . $this->path . "'";
                        break;

                        // Danish
                        case 'da':
                                $error_message[0] = "Ingen fil blev uploaded";
                                $error_message[1] = "Den maksimale filst�rrelse er overskredet. Filerne m� ikke v�re st�rre end " . $this->max_filesize/1000 . " KB (" . $this->max_filesize . " bytes).";
                                $error_message[2] = "Den maksimale billedst�rrelse er overskredet. Billeder m� ikke v�re st�rre end " . $this->max_image_width . " x " . $this->max_image_height . " pixels.";
                                $error_message[3] = "Kun " . str_replace("|", " or ", $this->acceptable_file_types) . " kan uploades.";
                                $error_message[4] = "Filen '" . $this->path . $this->file["name"] . "' eksisterer allerede.";
                                $error_message[5] = "Adgang n�gtet! Er ikke i stand til at kopiere filen til '" . $this->path . "'";
                        break;


                        // English
                        default:
                                $error_message[0] = "No file was uploaded";
                                $error_message[1] = "Maximum file size exceeded. File may be no larger than " . $this->max_filesize/1000 . " KB (" . $this->max_filesize . " bytes).";
                                $error_message[2] = "Maximum image size exceeded. Image may be no more than " . $this->max_image_width . " x " . $this->max_image_height . " pixels.";
                                $error_message[3] = "Only " . str_replace("|", " or ", $this->acceptable_file_types) . " files may be uploaded.";
                                $error_message[4] = "File '" . $this->path . $this->file["name"] . "' already exists.";
                                $error_message[5] = "Permission denied. Unable to copy file to '" . $this->path . "'";
                        break;
                }
                
                // for backward compatability:
                $this->errors[$error_code] = $error_message[$error_code];
                
                return $error_message[$error_code];
        }


        /**
         * void cleanup_text_file (string file);
         * 
         * Convert Mac and/or PC line breaks to UNIX by opening
         * and rewriting the file on the server
         * 
         * @param file                        (string) Path and name of text file
         * 
         */
        function cleanup_text_file($file){
                // chr(13)  = CR (carridge return) = Macintosh
                // chr(10)  = LF (line feed)       = Unix
                // Win line break = CRLF
                $new_file  = '';
                $old_file  = '';
                $fcontents = file($file);
                while (list ($line_num, $line) = each($fcontents)) {
                        $old_file .= $line;
                        $new_file .= str_replace(chr(13), chr(10), $line);
                }
                if ($old_file != $new_file) {
                        // Open the uploaded file, and re-write it with the new changes
                        $fp = fopen($file, "w");
                        fwrite($fp, $new_file);
                        fclose($fp);
                }
        }

}
?>
