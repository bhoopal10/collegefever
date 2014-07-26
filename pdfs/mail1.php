<?php
class AttachmentEmail {
	private $from = 'info@Indian Pageswealth.com';
	private $from_name = 'Indian Pages Wealth Creators';
	private $reply_to = 'info@newagebizsoft.com';
	private $to = '';
	private $subject = '';
	private $message = '';
	private $attachment = '';
	private $attachment_filename = '';

	public function __construct($to, $subject, $message, $attachment = '', $attachment_filename = '') {
		$this -> to = $to;
		$this -> subject = $subject;
		$this -> message = $message;
		$this -> attachment = $attachment;
		$this -> attachment_filename = $attachment_filename;
	}

	public function mail() {
		if (!empty($this -> attachment)) {
			$filename = empty($this -> attachment_filename) ? basename($this -> attachment) : $this -> attachment_filename ;
			$path = dirname($this -> attachment);
			$mailto = $this -> to;
			$from_mail = $this -> from;
			$from_name = $this -> from_name;
			$replyto = $this -> reply_to;
			$subject = $this -> subject;
			$message = $this -> message;

			$file = $path.'/'.$filename;
			$file_size = filesize($file);
			$handle = fopen($file, "r");
			$content = fread($handle, $file_size);
			fclose($handle);
			$content = chunk_split(base64_encode($content));
			$uid = md5(uniqid(time()));
			$name = basename($file);
			$header = "From: ".$from_name." <".$from_mail.">\r";
			$header .= "Reply-To: ".$replyto."\r";
			$header .= "MIME-Version: 1.0\r";
			$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\r";
			$header .= "This is a multi-part message in MIME format.\r";
			$header .= "--".$uid."\r";
			$header .= "Content-type:text/html; charset=iso-8859-1\r";
			$header .= "Content-Transfer-Encoding: 7bit\r\n\r";
			$header .= $message."\r\r";
			$header .= "--".$uid."\r";
			$header .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r"; // use diff. tyoes here
			$header .= "Content-Transfer-Encoding: base64\r";
			$header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\r";
			$header .= $content."\r\r";
			$header .= "--".$uid."--";

			/*echo "mailto :".$mailto;
			echo "<br><br>subject :".$subject;
			echo "<br><br>header :".$header;
			exit;*/
			if (mail($mailto, $subject, "", $header)) {
				return true;
			} else {
				return false;
			}
		} else {
			$header = "From: ".($this -> from_name)." <".($this -> from).">\r";
			$header .= "Reply-To: ".($this -> reply_to)."\r";

			if (mail($this -> to, $this -> subject, $this -> message, $header)) {
				return true;
			} else {
				return false;
			}

		}
	}
}
?>