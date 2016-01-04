<html>
<head>
    <meta content="text/html" charset="utf-8" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>EPCS ID Proofing Scheduler - Confirmation</title>

    <style type="text/css">
        h1, h2, p, a {font-family: Arial, sans-serif; -webkit-font-smoothing: antialiased;}

        .header h1 {color: #555555; font-size: 28px; font-weight: bold;}

        .content h2 {color:#646464; font-weight: bold; font-size: 18px;}
        .content p {color:#808080; font-weight: normal; padding: 0 40px; padding: 0; font-size: 17px; text-align: center;}
        .content a {color: #3e7698; text-decoration: none;}

        .date, .time {color: #3e7698; font-size: 20px; font-weight: 600;}

    </style>
</head>

<body style="background-color: #eeeeee; text-align: center;">
<table border="0" cellpadding="10" cellspacing="0" bgcolor="#ffffff">
    <tr>
        <table align="center" border="0" cellpadding="10" cellspacing="10" bgcolor="#ffffff" style="padding-top: 50px; border-collapse: collapse; border: solid 1px #e3dede;">
            <tr>
                <td class="header" width="600" bgcolor="#ffffff" align="center" style="padding: 40px 40px 0 40px;">
                    <h1 style="padding-bottom: 20px; border-bottom: solid 1px #e5e5e5;"><font face="Arial, sans-serif">EPCS ID Proofing Scheduler Confirmation</font></h1>
                </td>
            </tr>
            <tr>
                <td width="600" bgcolor="#ffffff" style="padding: 10px 30px 20px 30px;">
                    <table class="content" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr align="center">
                            <td colspan=100% style="padding: 10px 50px 30px 50px; font-family: Arial, sans-serif">
                                <?php

                                use Carbon\Carbon;

                                $time = Carbon::createFromTimestamp(strtotime($time));

                                $startTime  = $time->format('h:m a');
                                $endTime    = $time->addHour()->format('h:m a');

                                ?>
                                <p>This is to remind you that you have selected the following day and time to be fingerprinted:</p>
                                <p><font face="Arial, sans-serif"><span class="date">{{ $date }}</span> at <span class="time">{{ $startTime }} - {{ $endTime }}</span>.</font></p>

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td>&nbsp;</td>
            </tr>
        </table>
    </tr>
</table>
</body>
</html>

