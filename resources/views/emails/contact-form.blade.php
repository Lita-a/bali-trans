<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesan Baru dari Contact Form</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin:0; padding:0;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f4f4f4; padding: 20px;">
        <tr>
            <td>
                <table align="center" width="600" cellpadding="0" cellspacing="0" 
                       style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); overflow: hidden;">
                    
                    <tr>
                        <td style="background-color: #f97316; padding: 20px; text-align: center;">
                            <h1 style="color: #ffffff; font-size: 24px; margin: 0;">Pesan Baru dari Contact Form</h1>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 20px;">
                            <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                <tr>
                                    <td style="padding: 8px 0; font-weight: bold; width: 150px;">Nama:</td>
                                    <td style="padding: 8px 0;">{{ $data['name'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 0; font-weight: bold;">Email:</td>
                                    <td style="padding: 8px 0;">{{ $data['email'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 8px 0; font-weight: bold;">Tanggal:</td>
                                    <td style="padding: 8px 0;">{{ \Carbon\Carbon::now()->format('d M Y H:i') }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 0 20px 20px 20px;">
                            <p style="margin: 0 0 5px 0; font-weight: bold;">Pesan:</p>
                            <div style="background-color: #f9f9f9; border-left: 4px solid #f97316; padding: 15px; border-radius: 5px; color: #333333; line-height: 1.5;">
                                {{ $data['message'] }}
                            </div>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
