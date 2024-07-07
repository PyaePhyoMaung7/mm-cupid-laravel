<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $mail_data['company_name'] }}Account Activation</title>
    <style>
        .button {
            background-color: #dc3545;
            color: #ffffff !important;
            font-weight: bold;
            font-size: 1rem;
            padding: 8px 0;
            width: 100%;
            border: none;
            cursor: pointer !important;
            text-align: center;
            display: inline-block;
            text-decoration: none;
            border-radius: 5px;
            border: 1px solid #dc3545;
        }

        .button:hover {
            background-color: #ffffff;
            color:#dc3545  !important;
        }
        @media(min-width: 768px) {
            #container {
                width: 40% !important;
            }
        }
    </style>
</head>

<body>
    <div id="container" style="margin:0 auto; width: 80%;">
        <div style="margin: 20px;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                <div style="margin-right: 20px;">
                    <h3 style="font-size: 1.25rem;">Please reset your password</h3>
                </div>
                <div style="padding-top: 12px;">
                    <img style="border-radius: 50%; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); width: 40px; height: 40px;"
                        src="https://t3.ftcdn.net/jpg/01/03/47/46/360_F_103474653_V0uJ6bx4r62TYIg7oZYPZo57FR0rCmkY.jpg" alt="">
                </div>
            </div>
            <div style="margin: 20px 0;">
                <div style="font-size: 0.9rem;">Click the following link to reset your password</div>
                <div style="text-align: center; margin: 35px 0;">
                    <a href="{{ $mail_data['password_reset_link'] }}" class="button" target="_blank">
                        Reset your password
                    </a>
                </div>
                <div style="font-size: 0.9rem;">Didn't request for password reset?
                    <a href="{{ $mail_data['password_reset_link'] }}" style="text-decoration: none; color: blue;" target="_blank">
                            Change your password
                    </a>
                </div>
            </div>
            <div style="margin-top: 40px; background-color: #f8f9fa; padding: 16px;">
                <div style="display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">
                    <div style="margin-right: 12px; padding-top: 3px;">
                        <img style="border-radius: 50%; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); width: 40px; height: 40px;"
                            src="https://t3.ftcdn.net/jpg/01/03/47/46/360_F_103474653_V0uJ6bx4r62TYIg7oZYPZo57FR0rCmkY.jpg" alt="">
                    </div>
                    <div>
                        <h3 style="color: #dc3545; font-weight: bold;">{{ $mail_data['company_name'] }}</h3>
                    </div>
                </div>
                <div style="font-size: 11px; text-align: center;">
                    <a href="" style="color: #6c757d; text-decoration: none;">Help Center</a> .
                    <a href="" style="color: #6c757d; text-decoration: none;">Privacy Policy</a> .
                    <a href="" style="color: #6c757d; text-decoration: none;">Terms & Conditions</a>
                    <a href="" style="color: #6c757d; text-decoration: none; display: block;">Unsubscribe
                        {{ $mail_data['email'] }} from this email</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
