<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Verification Code</title>
</head>

<body style="margin: 0; padding: 0; background-color: #f4f6f8; font-family: Arial, Helvetica, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding: 40px 0;">
        <tr>
            <td align="center">
                <!-- Card -->
                <table width="100%" cellpadding="0" cellspacing="0"
                    style="max-width: 500px; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.08);">

                    <!-- Header / Logo -->
                    <tr>
                        <td align="center" style="padding: 30px; background-color: #4a90e2;">
                            <h2> P A R F E C T</h2>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding: 30px; text-align: center;">
                            <h2 style="margin: 0 0 10px; color: #333;">Verify Your Email</h2>

                            <p style="margin: 0 0 25px; color: #666; font-size: 15px;">
                                Use the verification code below to continue.
                            </p>

                            <!-- OTP Box -->
                            <div
                                style="
                            display: inline-block;
                            padding: 15px 30px;
                            font-size: 28px;
                            font-weight: bold;
                            letter-spacing: 6px;
                            color: #4a90e2;
                            background-color: #f0f6ff;
                            border-radius: 6px;
                            margin-bottom: 20px;
                        ">
                                {{ $otpCode }}
                            </div>

                            <p style="margin: 0; color: #999; font-size: 14px;">
                                This code expires in <strong>10 minutes</strong>.
                            </p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td
                            style="padding: 20px; text-align: center; background-color: #fafafa; font-size: 12px; color: #999;">
                            If you did not request this code, you can safely ignore this email.
                            <br><br>
                            © {{ date('Y') }} Parfect. All rights reserved.
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>

</html>
