<?php

function ConvertNumberToWords($number) {
    $hyphen      = ' ';
    $conjunction = ' and ';
    $separator   = ' ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'ConvertNumberToWords only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . ConvertNumberToWords(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . ConvertNumberToWords($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = ConvertNumberToWords($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= ConvertNumberToWords($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}

function GetDataByIDAndType($ID, $Type) {
  global $db;

	if ( $Type == 'admin' ) {
		$query = mysqli_query($db, "SELECT * FROM `" . DB_PREFIX . "admin` WHERE `admin_id` = $ID LIMIT 0, 1");
		if ( $query ) {
			if ( mysqli_num_rows($query) == 1 ) {
				$userData = mysqli_fetch_assoc($query);
			}
		}
	} else {
		$query = mysqli_query($db, "SELECT * FROM `" . DB_PREFIX . "employees` WHERE `emp_id` = $ID LIMIT 0, 1");
		if ( $query ) {
			if ( mysqli_num_rows($query) == 1 ) {
				$userData = mysqli_fetch_assoc($query);
			}
		}
	}
	return $userData;
}

function GetEmployeeDataByEmpCode($EmpCode) {
  global $db;

	$empData = array();
	$query = mysqli_query($db, "SELECT * FROM `" . DB_PREFIX . "employees` WHERE `emp_code` = '$EmpCode' LIMIT 0, 1");
	if ( $query ) {
		if ( mysqli_num_rows($query) == 1 ) {
			$empData = mysqli_fetch_assoc($query);
		}
	}
	return $empData;
}

function GetAdminData($Admin_ID) {
    global $db;

    $adminData = array();
    $query = mysqli_query($db, "SELECT * FROM `" . DB_PREFIX . "admin` WHERE `admin_id` = $Admin_ID LIMIT 0, 1");
    if ( $query ) {
        if ( mysqli_num_rows($query) == 1 ) {
            $adminData = mysqli_fetch_assoc($query);
        }
    }
    return $adminData;
}

function GetEmployeePayheadsByEmpCode($EmpCode) {
  global $db;

	$payData = array();
	$query = mysqli_query($db, "SELECT * FROM `" . DB_PREFIX . "pay_structure` AS `pay`, `" . DB_PREFIX . "payheads` AS `head` WHERE `pay`.`payhead_id` = `head`.`payhead_id` AND `pay`.`emp_code` = '$EmpCode'");
	if ( $query ) {
		if ( mysqli_num_rows($query) > 0 ) {
			while ( $headData = mysqli_fetch_assoc($query) ) {
				$payData[] = $headData;
			}
		}
	}
	return $payData;
}

function GetEmployeeSalaryByEmpCodeAndMonth($EmpCode, $month) {
  global $db;

	$salaryData = array();
	$query = mysqli_query($db, "SELECT * FROM `" . DB_PREFIX . "salaries` WHERE `emp_code` = '$EmpCode' AND `pay_month` = '$month'");
	if ( $query ) {
		if ( mysqli_num_rows($query) > 0 ) {
			while ( $payData = mysqli_fetch_assoc($query) ) {
				$salaryData[] = $payData;
			}
		}
	}
	return $salaryData;
}

function TotalSundaysAndSaturdays($month, $year) {
    $sundays = 0; $saturdays = 0;
    $total_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    for ( $i = 1; $i <= $total_days; $i++ ) {
        if ( date('N', strtotime($year . '-' . $month . '-' . $i)) == 7 ) {
            $sundays++;
        }
        if ( date('N', strtotime($year . '-' . $month . '-' . $i)) == 6 ) {
            $saturdays++;
        }
    }
    return $sundays + $saturdays;
}

function GetEmployeeLWPDataByEmpCodeAndMonth($EmpCode, $month) {
    global $db;
    
    $TotalSundaysAndSaturdays = TotalSundaysAndSaturdays(date('m', strtotime($month)), date('Y', strtotime($month)));
    $leaveData['workingDays'] = cal_days_in_month(CAL_GREGORIAN, date('m', strtotime($month)), date('Y', strtotime($month))) - $TotalSundaysAndSaturdays;

    // Total without leaves in the payment month
    $query = mysqli_query($db, "SELECT * FROM `" . DB_PREFIX . "leaves` WHERE `emp_code` = '$EmpCode' AND `leave_type` = 'Leave Without Pay' AND `leave_status` = 'approve'");
    if ( $query ) {
        if ( mysqli_num_rows($query) > 0 ) {
            while ( $row = mysqli_fetch_assoc($query) ) {
                if ( strpos($row['leave_dates'], ',') !== false ) {
                    $leaveDates = explode(',', $row['leave_dates']);
                    foreach ( $leaveDates as $date ) {
                        $leaveDate = date('F, Y', strtotime($date));
                        if ( $leaveDate == $month ) {
                            $withoutPay[] = 1;
                        }
                    }
                }
            }
        }
    }
    $leaveData['withoutPay'] = isset($withoutPay) ? array_sum($withoutPay) : 0;
    //====================

    // Total with pay leaves till date
    $nowMonth = date('n'); $nowYear = date('Y');
    if ( $nowMonth == 1 || $nowMonth == 2 || $nowMonth == 3 ) {
        $startYear = $nowYear - 1; $endYear = $nowYear;
    } else {
        $startYear = $nowYear; $endYear = $nowYear + 1;
    }
    $startMonth = 4; $endMonth = 3;
    $startDay = 1; $endDay = 31; $nowDay = date('j');
    $query = mysqli_query($db, "SELECT * FROM `" . DB_PREFIX . "leaves` WHERE `emp_code` = '$EmpCode' AND `leave_type` != 'Leave Without Pay'");
    if ( $query ) {
        if ( mysqli_num_rows($query) > 0 ) {
            while ( $row = mysqli_fetch_assoc($query) ) {
                if ( strpos($row['leave_dates'], ',') !== false ) {
                    $leaveDates = explode(',', $row['leave_dates']);
                    foreach ( $leaveDates as $date ) {
                        $leaveDate = strtotime(date('F, Y', $date));
                        if ( $leaveDate <= strtotime($month) ) {
                            $leaves[] = 1;
                        }
                    }
                }
            }
        }
    }
    $leaveData['payLeaves'] = isset($leaves) ? array_sum($leaves) : 0;
    //====================

    // Total leaves in a financial year
    $query = mysqli_query($db, "SELECT * FROM `" . DB_PREFIX . "holidays` WHERE `holiday_type` = 'compulsory' AND STR_TO_DATE(`holiday_date`, '%m/%d/%Y') BETWEEN '" . $startYear . '-' . $startMonth . '-' . $startDay . "' AND '" . $endYear . '-' . $endMonth . '-' . $endDay . "'");
    if ( $query ) {
        if ( mysqli_num_rows($query) > 0 ) {
            $leaveData['totalLeaves'] = mysqli_num_rows($query) + 7 + 12 + 12 + 6;
        }
    }

    return $leaveData;
}

function Send_Mail($subject, $message, $toName, $toMail, $fromName = FALSE, $fromMail = FALSE,  $cc = FALSE, $bcc = FALSE, $attachment = FALSE, $debug = FALSE) {
    include_once(dirname(__FILE__) . "/phpmailer/class.phpmailer.php");
    include_once(dirname(__FILE__) . "/phpmailer/class.smtp.php");
    $mail = new PHPMailer;

    $mail->isSMTP();
    $mail->Host       = PHPMAILER_HOST;
    $mail->Port       = PHPMAILER_PORT;
    $mail->SMTPAuth   = TRUE;
    $mail->Username   = PHPMAILER_USERNAME;
    $mail->Password   = PHPMAILER_PASSWORD;
    $mail->SMTPSecure = PHPMAILER_SMTPSECURE;

    if ( $fromName && $fromMail ) {
        $mail->From       = $fromMail;
        $mail->FromName   = $fromName;
    } else {
        $mail->From       = PHPMAILER_FROM;
        $mail->FromName   = PHPMAILER_FROMNAME;
    }

    if ( is_array($toName) && is_array($toMail) ) {
        for ( $i = 0; $i < count($toMail); $i++ ) {
            $mail->addAddress($toMail[$i], $toName[$i]);
        }
    } else {
        $mail->addAddress($toMail, $toName);
    }

    if ( $fromName && $fromMail ) {
        $mail->addReplyTo($fromMail, $fromName);
    } else {
        $mail->addReplyTo(PHPMAILER_FROM, PHPMAILER_FROMNAME);
    }

    if ( $cc ) {
        if ( is_array($cc) ) {
            for ( $i = 0; $i < count($cc); $i++ ) {
                $mail->addCC($cc[$i]);
            }
        } else {
            $mail->addCC($cc);
        }
    }

    if ( $bcc ) {
        if ( is_array($bcc) ) {
            for ( $i = 0; $i < count($bcc); $i++ ) {
                $mail->addBCC($bcc[$i]);
            }
        } else {
            $mail->addBCC($bcc);
        }
    }

    $mail->WordWrap = PHPMAILER_WORDWRAP;

    if ( $attachment ) {
        for ( $i = 0; $i < count($attachment); $i++ ) {
            $mail->addAttachment($attachment[$i]['src'], $attachment[$i]['name']);
        }
    }

    $mail->isHTML(TRUE);

    if ( $debug ) {
        $mail->SMTPDebug = 2;
    }

    $mail->Subject      = $subject;
    $mail->Body         = $message;

    if ( !$mail->send() ) {
        return 1;
    } else {
        return 0;
    }
}
