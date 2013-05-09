<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('convert_time_helper'))
{
    function convert_time_helper($day, $hour, $year, $minute, $second)
    {						
			//echo $day;
			if($year == 0)
			{
				if($day == 0)
				{
					if($hour == 0)
					{
						if($minute == 0)
						{
							$timeToUse = $second.(($second == 1)? " second ago" :  " seconds ago");
						}
						else
						{
							$timeToUse = $minute.(($minute==1)?" minute ago": " minutes ago");
						}
					}
					else
					{
						$timeToUse = $hour.(($hour == 1)? " hour ago" : " hours ago");
					}
				}
				else
				{
					$timeToUse = $day.(($day == 1)?" day ago" : " days ago");
				}
			}
			else
			{
				$timeToUse = $year.(($year == 1)?" year ago" : " years ago");
			}						
		
		return $timeToUse;
	}
	
}