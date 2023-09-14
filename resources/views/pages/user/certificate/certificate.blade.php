<html>
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Gupter:wght@400;500&family=Lato:ital,wght@0,300;0,400;1,300;1,400&family=Marck+Script&display=swap" rel="stylesheet">
    <style type="text/css">
      
        body,
        html {
            margin: 0;
            padding: 0; 
            
        }

        body {
            background-image: url("images/print_background.jpg");
            color: black;
            display: table;
            font-family: Georgia, serif;
            font-size: 20px;
            text-align: center;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            font-family: "Roboto", sans-serif;
            opacity:0;
        }

        .container {
            width: 100%;
            height: 100%;
            display: table-cell;
            vertical-align: middle;
        }

        .logo {
            position: absolute;
            top: 20%;
            left: 7%;
            max-width: 12%;
        }

        .icon {
            position: absolute;
            top: 52%;
            right: 10%;
            max-width: 14%;
        }

        .title {
            color: 870CA5;
            font-size: 56px;
            font-weight: bold;
            font-family: "Gupter", serif;
            width: 80%;
            margin: auto;
        }

        .subtitle {
            font-size: 22px;
            font-family: "Lato", sans-serif;
            color:#2c2e35;
        }

        .course {
            font-size: 56px;
            margin: 16px;
            font-family: "Marck Script", cursive;
            font-weight: bold;
        }

        .assignment {
            font-family: "Lato", sans-serif;
            margin: 10px;
            font-style: italic;
            font-weight: 400;
            color:#2c2e35;
        }

        .person {
            border-bottom: 2px solid black;
            font-size: 32px;
            margin: 20px auto;
            width: 400px;
            color:#2c2e35;
            line-height: 2;
        }
        
        .dotted {
            border-bottom: 2px dotted #000;
            text-decoration: none;
        }
        
        .reason {
            font-family: "Lato", sans-serif;
            margin: 20px;
            max-width: 60%;
            margin: auto;
            line-height: 1.8;
            font-style: italic;
            font-weight: 400;
            color:#2c2e35;
        }

        .foot-table {
            margin: auto;
            text-align: center;
            margin-top: 3%;
            width: 100%;
        }

        .foot-table td {
            vertical-align: baseline;
            font-size: 12px;
            width: 33.33%;
        }

        .sign-preson {
	font-size: 14px;
	margin: 5px;
	color: #870CA5;
	font-weight: bold;
}
div.dotted {
	width: 50%;
	margin: auto;
    line-height: 2;
}
.sign {
	max-width: 100px;
}
@media print {
   body{
    opacity:1;
   }
}
    </style>
    <style type="text/css" media="print">
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>

</head>

<body>
    <div class="container">

        <img class="logo" src="images/logo.png" alt="">
        <img class="icon" src="images/icon.png" alt="">

        <div class="title">
            INSTITUTE FOR PROFESSIONAL
            DEVELOPMENT
        </div>

        <div class="course">
            Announcing Course
        </div>

        <div class="subtitle">
            CERTIFICATE OF COMPLETION
        </div>

        <div class="assignment">
            This is proudly presented to
        </div>

        <div class="person dotted">
            {{ auth::user()->fname.' '.auth::user()->lname }}
        </div>

        <div class="reason">
            for participating and successfully completing
            <br>
            the Presentation & Announcing Course.
            <br>
            Awarded <span class="dotted">{{ certificate(auth::user()->id)->issue_date }}</span>
            <br>
            The approved programme at IPD
        </div>
        <table class="foot-table">
            <tr>
                <td>
                    <div class="dotted">
                    <img class="sign" src="images/signs/sign1.png" alt="">
                    </div>

                    <div class="sign-preson">
                        Lal Sarath Kumara
                    </div>
                    Voice Over Artist
                    <br>
                    Television and Radio/Senior Lecturer
                </td>
                <td>
                    <div class="dotted">
                    <img class="sign" src="images/signs/sign3.png" alt="">
                    </div>

                    <div class="sign-preson">
                        K. A. Priyanka Perera
                    </div>
                    Consultant
                    <br>
                    Training and Skill Development
                    <br>
                    IPD Institute
                </td>
                <td>
                    <div class="dotted">
                    <img class="sign" src="images/signs/sign2.png" alt="">
                    </div>

                    <div class="sign-preson">
                        Chanaka Inoj
                    </div>
                    Senior Journalist / Lecturer &
                    <br>
                    News Anchor
                </td>
            </tr>
        </table>
    </div>
<script>
    window.print();
    window.history.back();
</script>

</body>

</html>

    
    {{-- <html>

<head>
    <title>Certificate Not Found</title>
    <style>
        * {
            transition: all 0.6s;
        }

        html {
            height: 100%;
        }

        body {
            font-family: "Lato", sans-serif;
            color: #888;
            margin: 0;
        }

        #main {
            display: table;
            width: 100%;
            height: 100vh;
            text-align: center;
        }

        .fof {
            display: table-cell;
            vertical-align: middle;
        }

        .fof h1 {
            font-size: 50px;
            display: inline-block;
            padding-right: 12px;
            animation: type .2s alternate infinite;
        }

        @keyframes type {
            from {
                box-shadow: inset -3px 0px 0px #888;
            }

            to {
                box-shadow: inset -3px 0px 0px transparent;
            }
        }
    </style>
</head>

<body>
    <div id="main">
        <div class="fof">
            <h1>Certificate Not Found</h1>
        </div>
    </div>
    <script>
    setTimeout("history.go(-1)", 1000);
</script>
</body>

</html> --}}