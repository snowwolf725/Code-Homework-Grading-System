<?
class FileMgr
{
	var $check;
	var $path;
	var $_filename=array();
	var $_filesize=array();
	var $_filetime=array();
	function saveFile($filename,$filecontext)
	{
		$fp=fopen($filename,"w");
		if($fp)
		{
			fwrite($fp,$filecontext);
			fclose($fp);
		}
	}
	function runFile($filename)
	{
		exec($filename,$result_a);
		for($i=0;$i<sizeof($result_a);$i++)
			$result.=$result_a[$i];
		$result=htmlspecialchars($result);
		return nl2br($result);
	}
	function makeFile()
	{
		exec("make",$result_a);
		for($i=0;$i<sizeof($result_a);$i++)
			$result.=$result_a[$i];
		$result=htmlspecialchars($result);
		return nl2br($result);
	}
	function delFiles($filename)
	{
		for($i=0;$i<sizeof($filename);$i++)
			unlink($filename[$i]);
	}
	function getFileContext($filename)
	{
		$filecontext=file_get_contents($filename);
		return $filecontext;
	}
	function getFileList()
	{
		if($this->check)
		{
			$handle=opendir('.');
			while ($file = readdir($handle)) {
				if(strcmp($file,".")&&strcmp($file,"..")&&!is_dir($file))
				{
					array_push($this->_filename,$file);
					array_push($this->_filesize,filesize($file));
					array_push($this->_filetime,gmstrftime("%b %d %Y %H:%M:%S",filemtime($file)));
					//echo "$file ".filesize($file)." ".gmstrftime("%b %d %Y %H:%M:%S",filemtime($file))."<br>";
				}
			}
			closedir($handle);
		}
	}
	function FileMgr($newpath)
	{
	 $this->path=$newpath;
	 $this->check=chdir($this->path);
	}
}
?>
