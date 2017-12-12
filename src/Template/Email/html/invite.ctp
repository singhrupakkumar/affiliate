<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
    <div class="main-page" style="width:100%; float:left"> 
        <div class="container" style="width:100%; display: table; margin:0 auto;">
            <table class="main-table" width="600px;" align="center" cellpadding="0" cellspacing="0" style="border: 1px solid #FE938C;">
                <thead style="width:100%;">
                    <tr style="width:100%; background-color:#f2f2f2;">
                        <th style="height:50px; font-size:19px; text-transform:uppercase; color:#ff6767; padding:0px 10px; font-family: sans-serif;">Invite Code</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="width:100%; text-align:center; padding:0px 10px;">
                            <h1 style="text-transform:uppercase; font-family: sans-serif;">Logo</h1>   
                            <p style="color:#9b9b9b; line-height:19px; font-family: sans-serif;">Hi <?php  echo $email; ?>,<br/>Your friend invite to you for <br />Affiliate Shop<br/> Please use this referral code for the Affiliate Shop account registration and get benefits </p>
                        </td>
                    </tr>
					<tr style="width:100%;">
						<td style="width:100%;">			 			
							<table style="width:100%;" cellpadding="0" cellspacing="0">
							
									<tr>
								
										<td style="padding:10px 10px;text-align:center;">
                                                                                    <a style="text-decoration: none; font-family: sans-serif; font-size: 14px; color: #fff; padding: 10px 15px; background-color: #FE938C; border-radius: 100px; margin:12px 0px;"href="<?php echo $link; ?>">Click Here</a><br/>
									 <p style="color:#9b9b9b; line-height:19px; font-family: sans-serif;">
									 Copy this link and paste in url <br/>
									<span style="color: blue;"><?php echo $link; ?></span>
									 </p>
									 
										</td>
									</tr>
								
							</table>
						</td>
					</tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>