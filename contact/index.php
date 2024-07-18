<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Registration Form </title>
    <link href="https://fonts.googleapis.com/css?family=Bubblegum+Sans|Nova+Mono|Roboto+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Parisienne&display=swap" rel="stylesheet">
    <style>
   body {
            text-align: center;
            background-image: linear-gradient(135deg, #A52A2A 30%, #A52A2A 90%);
        }

        .register-wrapper {
            position: relative;
            z-index: 3;
            padding: 50px 100px; /* Reduced top padding */
            font-size: 18px;
            color: #999999;
        }

        .register-wrapper * {
            box-sizing: border-box;
        }

        .register-wrapper form input {
            display: inline-block;
            width: 100%;
            padding: 0 20px;
            line-height: 50px;
            height: 65px;
            background-color: white;
            border: 2px solid #e6e6e6;
            border-bottom-width: 3px;
            border-radius: 5px;
            outline: 0;
            transition: all 0.3s ease;
        }

        .register-wrapper form input:not(:last-child) {
            margin-bottom: 20px;
        }

        .register-wrapper form input[type="email"]:focus,
        .register-wrapper form input[type="email"]:active,
        .register-wrapper form input[type="password"]:focus,
        .register-wrapper form input[type="password"]:active {
            border-color: #cccccc;
        }

        .register-wrapper form input[type="submit"] {
            position: relative;
            z-index: 1;
            display: inline-block;
            padding: 0 20px;
            font-size: 1rem;
            background-color: #f2395a;
            background-size: 100%;
            background-image: linear-gradient(45deg,
            rgba(255, 255, 255, 0.15) 25%, rgba(0, 0, 0, 0) 25%,
            rgba(0, 0, 0, 0) 50%,
            rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, rgba(0, 0, 0, 0) 75%,
            rgba(0, 0, 0, 0));
            background-size: 20px 20px, 100% 100%;
            border: 1px solid #f02146;
            border-bottom-width: 3px;
            color: white;
            outline: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .register-wrapper form input[type="submit"]:hover {
            background-size: 40px 40px;
        }

        .register-title {
            font-size: 1.5em;
            padding-bottom: 30px;
            margin: 0 0 20px;
            border-bottom: 1px dashed #e6e6e6;
        }

        .register-block {
            position: relative;
            display: block;
            width: 100%;
            max-width: 700px;
            margin: auto;
            padding: 30px;
            background-color: white;
            box-shadow: 0 0 50px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        .register-block:before,
        .register-block:after {
            position: absolute;
            z-index: -1;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: block;
            width: 100%;
            height: 100%;
            content: "";
            background-color: white;
            border: 1px solid #e6e6e6;
            border-radius: 5px;
            transform: scale(0.9) translate(0, 0);
            transition: all 0.3s ease;
        }

        .register-block:hover:before {
            z-index: -1;
            transform: scale(0.96) translate(0, 16px);
        }

        .register-block:hover:after {
            z-index: -2;
            transform: scale(0.92) translate(0, 32px);
        }

        h1, a {
            font-family: 'Parisienne', cursive;
            color: #fff;
            font-size: 50px;
            text-decoration: none;
            text-shadow: 2px 2px 3px lightblue;
            margin-top: 10px; /* Reduced top margin */
            padding-top: 0; /* Removed padding top */
        }
</style>
</head>
<body>
    <h1> Registration Form.</h1>
    <div class="content">
        <section>
            <div class="register-wrapper">
                <div class="register-block">
                    
                    
                  <form method="post" action="registration.php" enctype="multipart/form-data">
                  	 <label for="photo">Upload Photo:</label>
                        <input type="file" id="photo" name="photo" accept="image/*" required/>
   
                <input type="text" name="full_name" placeholder="Full Name" required/>
                <input type="text" name="birthday" placeholder="Birthday" required/>
                <input type="email" name="email_id" placeholder="Email" required/>
                <input type="tel" name="mobile_number" placeholder="Mobile Number" required/>
                <input type="text" name="birth_place" placeholder="Birth Place" required/>
                <input type="text" name="height" placeholder="Height" required/>
                <input type="text" name="weight" placeholder="Weight" required/>
                
                <input type="text" name="current_address" placeholder="Current Address"/>
                <input type="text" name="education" placeholder="Education" required/>
                <input type="text" name="occupation" placeholder="Occupation" required/>
                <input type="text" name="income" placeholder="Income" required/>
                <input type="text" name="father_name" placeholder="Father's Name"/>
                <input type="text" name="father_occupation" placeholder="Father's Occupation"/>
                <input type="text" name="father_income" placeholder="Father's Income"/>
                <input type="submit" value="Create my account"/>
            </form>
                </div>
            </div>
        </section>
    </div>
    <footer>
       
    </footer>
</body>
</html>
