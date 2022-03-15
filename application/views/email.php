<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Contato Bracci</title>

  <style>
    table td {border-collapse: collapse;}
    hr {
      height: 1px!important;
      color: #eeeeee!important;
      background-color: #eeeeee!important;
      border: 0px!important;
    }
    img {border:0!important;vertical-align: middle;}
  </style>
</head>

<body style="margin: 0;padding: 20px 0 20px 0;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family: Helvetica, Arial, Verdana, sans-serif; color: #55555; font-size: 14px; line-height: 21px;" align="center">
  <tr>
    <td align="center" style="padding: 20px 0 20px 0;">
      <table width="640" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
            <table>
              <tr>
                <td style="background-color:#000;padding: 20px 0 20px 0;" align="left">
                  <h2><img src="http://webapp240025.ip-172-104-7-23.cloudezapp.io/public/img/logo.png" width="168" height="28" alt="Bracci" style="vertical-align: middle; padding-left:20px;" /></h2>
                </td>
              </tr>
              <tr>
                <td style="padding: 20px 0 20px 0;" align="left" valign="top">
                  <table width="640" border="0" cellspacing="0" cellpadding="0" style="border-bottom: 1px solid #eee; padding: 0 0 20px 0; margin: 0 0 20px 0;">
                    <tr>
                      <td width="430" valign="top" align="left" style="padding: 5px 0 0 0">
                        <p style="font-size: 32px; color: #666; line-height: 42px; letter-spacing: -2; margin: 0; padding: 0;">Contato Bracci</p>
                      </td>
                    </tr>
                    <tr style="color: #999999; font-size: 14px;margin:0;padding:0;">
                      <td>
                       
                        <p style="margin-bottom:0;padding:0;">
                          <?php echo $dados['message']; ?>
                        </p>
                        <p style="margin-bottom:0;padding:0;">
                          <b style="color: #666;font-size: 16px;">Cidade:</b> <?php echo $dados['city']; ?>
                        </p>
                        <p style="margin-bottom:0;padding:0;">
                          <b style="color: #666;font-size: 16px;">Telefone:</b> <?php echo $dados['phone']; ?>
                        </p>
                        <p style="margin-bottom:0;padding:0;">
                          <b style="color: #666;font-size: 16px;">De:</b> <?php echo $dados['email']; ?>
                        </p>
                       
                      </td>
                    </tr>
                    
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</body>
</html>
