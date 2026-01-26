<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Booking Request</title>
</head>
<body style="margin:0; padding:0; background-color:#f5f5f5; font-family: Arial, Helvetica, sans-serif;">

<div style="max-width:600px; margin:30px auto; background:#ffffff; border-radius:8px; overflow:hidden;">

    <!-- Header -->
    <div style="background:#32519b; padding:20px; text-align:center;">
        <h2 style="margin:0; color:#ffffff; font-size:22px;">
            New Booking Request
        </h2>
    </div>

    <!-- Card Content -->
    <div style="padding:25px;">

        <p style="margin-top:0; color:#333333; font-size:15px;">
            A new booking request has been submitted with the following details:
        </p>

        <!-- Field -->
        <div style="margin-bottom:15px;">
            <label style="display:inline; font-size:13px; color:#666666; margin-bottom:4px;">
                Request date :
            </label>
            <span style="font-size:15px; color:#333333; font-weight:600;">
                {{ $data['request_date'] }}
            </span>
        </div>        <div style="margin-bottom:15px;">
            <label style="display:inline; font-size:13px; color:#666666; margin-bottom:4px;">
                Patient Name :
            </label>
            <span style="font-size:15px; color:#333333; font-weight:600;">
                {{ $data['patient_name'] }}
            </span>
        </div>

        <div style="margin-bottom:15px;">
            <label style="display:inline; font-size:13px; color:#666666; margin-bottom:4px;">
                Email Address :
            </label>
            <span style="font-size:15px; color:#333333;">
                    {{ $data['patient_email'] }}
            </span>
        </div>

        <div style="margin-bottom:15px;">
            <label style="display:inline; font-size:13px; color:#666666; margin-bottom:4px;">
                Phone Number :
            </label>
            <span style="font-size:15px; color:#333333;">
                {{ $data['patient_phone'] }}
            </span>
        </div>

        <div style="margin-bottom:15px;">
            <label style="display:inline; font-size:13px; color:#666666; margin-bottom:4px;">
                Service name :
            </label>
            <span style="font-size:15px; color:#333333;">
                 {{ $data['service_name_en'] }} -  {{ $data['service_name_ar'] }}
            </span>
        </div>

        @if(!empty(  $data['patient_notes'] ))
        <div style="margin-bottom:20px;">
            <label style="display:block; font-size:13px; color:#666666; margin-bottom:6px;">
                Notes :
            </label>
            <span style="
                display:block;
                font-size:14px;
                color:#333333;
                background:#f8fcfd;
                padding:12px;
                border-radius:6px;
                line-height:1.6;">
                {{ $data['patient_notes'] }}
            </span>
        </div>
        @endif

        <!-- Divider -->
        <div style="height:1px; background:#eeeeee; margin:25px 0;"></div>

        <p style="font-size:12px; color:#666666; margin-bottom:0;">
            This email was automatically generated from the Alforsan booking request.
        </p>

    </div>

    <!-- Footer -->
    <div style="background:#11b3cf; padding:12px; text-align:center;">
        <span style="font-size:12px; color:#ffffff;">
            © {{ date('Y') }} Alforsan Hospital. All rights reserved.
        </span>
    </div>

</div>

</body>
</html>
