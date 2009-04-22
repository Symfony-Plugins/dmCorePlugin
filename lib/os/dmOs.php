<?php

class dmOs
{

	protected static
	  $separator = "/";

	/*
	 * Builds a path with many path parts
	 *
	 * dmOs("/home/user/", "/dir", "sub_dir", "file.ext")
	 * returns "/home/user/dir/sub_dir/file.ext"
	 */
	public static function join()
	{
		$parts = func_get_args();
		/*
		 * Join path parts with $separator
		 */
    $dirty_path = implode(self::$separator, $parts);

    /*
     * Removes multiple $separator
     */
    $clean_path = preg_replace(
      "|(".preg_quote(self::$separator, "|")."){2,}|",
      self::$separator,
      $dirty_path
    );

    /*
     * Adds $separator to the beginning
     * Removes $separator from the end
     */
    $standard_path = self::$separator.trim($clean_path, self::$separator);

    return $standard_path;
	}

}