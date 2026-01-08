<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Air Request</title>

    <style>
        body {
            margin: 0;
            padding: 10px;
            font-family: sans-serif;
            font-size: 12px;
            color: #212529;
            line-height: 1.45;
        }

        .container {
            border: 1px solid #CED4DA;
            border-radius: 6px;
        }
        .section {
            padding: 10px 15px;
        }

        .header-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .small-label {
            color: #6B7280;
            font-size: 11px;
        }

        .section-title {
            font-weight: 500;
            font-family: sans-serif;
            font-size: 14px;
            margin-top: 8px;
            margin-bottom: 6px;
            padding-bottom: 4px;
        }

        .flight-block {
            padding: 10px 12px;
            border-bottom: 1px solid #CED4DA;
        }

        .flight-header {
            font-weight: 700;
            font-size: 13px;
            margin-bottom: 4px;
        }
        .block {
            display: block;
        }
        .text {
            font-size: 13px;
            font-weight: 400;
            padding-bottom: 4px;
        }
        .gray {
            color: #495057;
        }
        .black {
          color: #212529;
        }
        .blue {
            color: #062060;
        }
        .border-bottom {
            border-bottom: 1px solid #CED4DA;
            padding-bottom: 8px;
        }

        table.passenger-table {
            width: 100%;
            border-collapse: collapse;
        }

        table.passenger-table td {
            padding: 4px 2px;
            vertical-align: top;
        }
        table.documents-table {
            width: 100%;
            padding: 8px 0;
            border-collapse: collapse;
        }
        .documents-table-wrapper {
            border: 1px solid #CED4DA;
            border-radius: 6px;
        }

        table.documents-table td {
            padding: 4px 12px;
            vertical-align: top;
            border-bottom: 1px solid #CED4DA;
        }
        table.documents-table tr:last-child td {
            border-bottom: none;
        }
        .table-header-row {
            border-bottom: 1px solid #CED4DA;
        }

        .block-title {
            font-weight: 700;
        }
        p {
            margin: 0;
            padding: 0;
            line-height: 1.45;
        }
    </style>
</head>

<body>

<div class="container">

    <!-- HEADER -->
    <div style="width:100%; padding-bottom:12px; padding-top:12px; position:relative; overflow:hidden;" class="border-bottom">
        <div style="display:inline-block; width:47%; vertical-align:top; text-align:left; padding:0 0 0 12px;">
            <p style="margin:0; font-weight:700; font-size:18px; color:#212529; line-height:1.2;">Request #AR-12849</p>
            <p style="margin:0; color:#495057; font-size:13px;">Domestic &bull; Refundable</p>
        </div>
        <div style="display:inline-block; width:47%; vertical-align:middle; text-align:right; padding:0 12px 0 0;">
            <span style="color:#DC3545; font-weight:600; font-size:13px; font-family:inherit; display:inline-block; vertical-align:middle;">
                <img src="urgent.png" width="20" height="20" alt="!" style="display:inline-block; vertical-align:middle; margin-right:8px;">
                Marked as urgent
            </span>
        </div>
    </div>


    <!-- TRIP DETAILS -->
    <div class="border-bottom">
        <div class="section-title section">Trip details</div>

        <!-- ITINERARY FOR PASSENGER -->
        <div style="background-color: #F2F6FC; padding: 10px; font-weight: 400; font-size: 13px;">Jonathan Ellington itinerary</div>

        <div class="section">
            <div class="border-bottom">
                <div class="gray text">
                    <span class="blue"><strong>Flight 1 |</strong></span> NYC • ATL • LAS &rarr; LHR
                </div>

                <div class="gray text">
                    <strong>Departure from:</strong>
                    <span class="block black">NYC • ATL • LAS</span>
                </div>
                <div class="gray text">
                    <strong>Arrive at:</strong>
                    <span class="block black">LHR, London Heathrow</span>
                </div>

                <div class="text gray">
                    <strong>Travel date:</strong>
                    <span class="block black">Wed 16 Jul, 2025</span>
                </div>
                <div class="text gray">
                    <strong>Preferred departure time:</strong>
                    <span class="block black">Evening: 6PM – 12AM</span>
                </div>
                <div class="gray text">
                    <strong>Preferred cabin class:</strong>
                    <span class="block black">Premium economy • Business • Economy • First</span>
                </div>
            </div> 
        </div>
        <div class="section">
            <!-- exclude border bottom for last flight -->
            <div>
                <div class="gray text">
                    <span class="blue"><strong>Flight 2 |</strong></span> LHR • CDG &rarr; DXB
                </div>
                <div class="gray text">
                    <strong>Flight details:</strong>
                    <span class="block black">Specific flight details</span>
                </div>
            </div>
        </div>
    </div>

    <!-- PASSENGERS -->
     <div class="section border-bottom">
        <div class="section-title">Passenger details</div>
        <div class="block-title blue">Passenger #1 <span class="black">— Primary</span></div>
        <table class="passenger-table border-bottom">
            <tr>
                <td>
                    <div class="gray text">
                        <strong>Full name</strong>
                        <span class="block black">Jonathan Jackson Ellington</span>
                    </div>
                </td>
                <td>
                    <div class="gray text">
                        <strong>Date of birth</strong>
                        <span class="block black">October 14, 1972</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="gray text">
                        <strong>Gender</strong>
                        <span class="block black">Male</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="gray text">
                        <strong>Email</strong>
                        <span class="block black">johnellington@gmail.com</span>
                    </div>
                </td>
                <td>
                    <div class="gray text">
                        <strong>Phone number</strong>
                        <span class="block black">+1 (234) 125 - 0923</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="gray text">
                        <strong>Global entry number</strong>
                        <span class="block black">09965492101</span>
                    </div>
                </td>
                <td>
                    <div class="gray text">
                        <strong>Known traveler number</strong>
                        <span class="block black">09965492101</span>
                    </div>
                </td>
            </tr>
        </table>

        <!-- Passenger no-primary -->

        <div class="block-title blue">Passenger #2 <span class="black">— Additional</span></div>
        <!-- exclude border bottom for last flight -->
        <table class="passenger-table pt-2">
            <tr>
                <td>
                    <div class="gray text">
                        <strong>Full name</strong>
                        <span class="block black">Jonathan Morison</span>
                    </div>
                </td>
                <td>
                    <div class="gray text">
                        <strong>Date of birth</strong>
                        <span class="block black">October 14, 1972</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="gray text">
                        <strong>Gender</strong>
                        <span class="block black">Male</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="gray text">
                        <strong>Email</strong>
                        <span class="block black">johnellington@gmail.com</span>
                    </div>
                </td>
                <td>
                    <div class="gray text">
                        <strong>Phone number</strong>
                        <span class="block black">+1 (234) 125 - 0923</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="gray text">
                        <strong>Global entry number</strong>
                        <span class="block black">09965492101</span>
                    </div>
                </td>
                <td>
                    <div class="gray text">
                        <strong>Known traveler number</strong>
                        <span class="block black">09965492101</span>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- TRAVELER PREFERENCES -->
    
    <div class="section border-bottom">
        <div class="section-title">Traveler preferences</div>
            <div class="gray text">
                <strong>Preferred airlines:</strong>
                <span class="block black">Alaska Airlines • JetBlue Airways • Southwest Airlines</span>
            </div>
            <div class="gray text">
                <strong>Preferred aircraft:</strong>
                <span class="block black">Boeing Dreamliner</span>
            </div>
            <div class="gray text">
                <strong>Seats:</strong>
                <span class="block black">Aisle</span>
            </div>   
            <div class="gray text">
                <strong>Requests:</strong>
                <span class="block black">No red-eye flights • Extra legroom • Lie-flat seating</span>
        </div>    
    </div>

    <!-- SPECIAL REQUESTS -->

    <div class="section border-bottom">
        <div class="section-title" style="margin: 0">Special Requests</div>
        <div class="gray text">
            <span class="block black"> Kosher meals for all passengers. Assistance with stroller for Passenger 2.</span>
        </div>   
    </div>

    <!-- DOCUMENTS -->
    <div class="section border-bottom">
        <div class="section-title" style="margin: 0">Documents</div>
        <div class="documents-table-wrapper">
            <table class="pt-2 documents-table">
                <thead>
                    <tr class="table-header-row">
                        <td>Name</td>
                        <td>File attached</td>
                    </tr>   
                </thead>
                <tbody>
                    <tr>
                        <td class="black">
                            2296600f-ecd5-4c6d-9d51-445e895ea824.webp
                        </td>
                        <td class="black">
                            Primary passenger
                        </td>
                    </tr>
                    <tr>
                        <td class="black">
                            2296600f-ecd5-4c6d-9d51-445e895ea824.webp
                        </td>
                        <td class="black">
                            Additional passenger
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>    
</div>

</body>
</html>