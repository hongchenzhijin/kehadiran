<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cantikkan-GUI.css">
    <?php 
        # memulakan fungsi session
        session_start();

        #memanggil fail header.php, connection.php dan guard-aktiviti.php
        include('header.php');?>
    <style>
        body {
            background-color: #f4f4f4;
            color: #333;
        }
        p{
            font: size 18px;
            text-align: left;
        }
        nav p{
            font: size 18px;
            text-align: center;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        section {
            padding: 20px 0;
        }
        figure {
            margin: 20px 0;
            text-align: center;
        }
        figure img {
            max-width: 100%;
            height: auto;
        }
        figure figcaption {
            margin-top: 10px;
            font-style: italic;
            color: #555;
        }
    </style>
</head>
<body>
    <section class="container">
        <center><iframe 
            width="850" height="480" 
            src="https://www.youtube.com/embed/yBIS2mj0vQ4?autoplay=1" 
            frameborder="0"
            allowfullscreen>
        </iframe></center>

        <h2>Our History</h2>
        <p>The Red Crescent Society, part of the International Red Cross and Red Crescent Movement, has been a beacon of humanitarian aid and emergency response since its inception. Founded in 1863, the Red Crescent Society was established to provide emergency assistance, disaster relief, and education in communities facing crises.</p>        
        <p>Significant milestones in our history include:</p>
        <ul>
            <li><strong>1859:</strong> Henri Dunant organized emergency aid services for wounded Austrian and French soldiers.</li>
            <li><strong>1863:</strong> Establishment of the International Committee for the Relief of the Wounded.</li>
            <li><strong>1906:</strong> In Muslim countries, the name “Red Crescent” was adopted at the insistence of the Ottoman Empire.</li>
            <li><strong>1948:</strong> Establishment of the Malaysian Red Crescent Society (MRCS).</li>
        </ul>

        <figure>
            <img src="images/history.jpeg" alt="Historical image of Red Crescent Society">
            <figcaption>Red Crescent volunteers providing aid during an early disaster response mission.</figcaption>
        </figure>

        <br>
        <h2>Preventing Infectious Diseases</h2>
        <p>Infectious diseases can spread rapidly and have devastating effects on communities. Here are key ways to prevent the spread of infectious diseases:</p>
        <ul>
            <li><strong>Hand Hygiene:</strong> Regularly wash your hands with soap and water for at least 20 seconds, especially before eating, after using the restroom, and after coughing or sneezing.</li>
            <li><strong>Vaccination:</strong> Stay up-to-date with vaccinations to protect against preventable diseases such as measles, influenza, and hepatitis.</li>
            <li><strong>Safe Food Practices:</strong> Ensure food is properly cooked and stored, and avoid consumption of raw or undercooked animal products.</li>
            <li><strong>Clean Water:</strong> Drink and use safe, clean water. Boil water if you are unsure of its safety.</li>
            <li><strong>Respiratory Hygiene:</strong> Cover your mouth and nose with a tissue or elbow when coughing or sneezing, and dispose of tissues immediately.</li>
            <li><strong>Avoid Close Contact:</strong> Keep a safe distance from individuals who are visibly ill and avoid sharing personal items.</li>
            <li><strong>Surface Disinfection:</strong> Regularly clean and disinfect frequently-touched surfaces such as doorknobs, light switches, and mobile phones.</li>
            <li><strong>Use of PPE:</strong> Wear masks and use personal protective equipment (PPE) when necessary, especially in healthcare settings or during outbreaks.</li>
        </ul>

        <figure>
            <img src="images/handwashing.png" alt="Proper handwashing technique">
            <figcaption>Proper handwashing technique to prevent the spread of infectious diseases.</figcaption>
        </figure>

        <br>
        <h2>How to Perform CPR</h2>
        <h3>Adult CPR (for individuals over the age of 8)</h3>
        <ol>
            <li><strong>Check Responsiveness:</strong> Tap the person on the shoulder and shout, "Are you okay?" If there is no response, proceed.</li>
            <li><strong>Call for Help:</strong> Dial emergency services immediately. If you are not alone, have someone else call for help.</li>
            <li><strong>Open the Airway:</strong> Tilt the person's head back slightly to open the airway.</li>
            <li><strong>Check for Breathing:</strong> Look for chest movement, listen for breathing sounds, and feel for breath on your cheek. If the person is not breathing, start CPR.</li>
            <li><strong>Chest Compressions:</strong> Place the heel of one hand on the center of the chest, and place the other hand on top, interlocking your fingers. Press down hard and fast, at a rate of 100-120 compressions per minute, allowing the chest to rise completely between compressions.</li>
            <li><strong>Rescue Breaths:</strong> After 30 compressions, give 2 rescue breaths. Pinch the person’s nose, cover their mouth with yours, and blow until you see the chest rise. If the chest does not rise, re-tilt the head and try again.</li>
            <li><strong>Continue CPR:</strong> Keep performing cycles of 30 compressions and 2 breaths until help arrives or the person shows signs of life (breathing, movement).</li>
        </ol>

        <figure>
            <img src="images/cpr-adult.jpeg" alt="Diagram of adult CPR procedure">
            <figcaption>Diagram showing the steps for performing CPR on an adult.</figcaption>
        </figure>

        <h3>Child CPR (for children ages 1-8)</h3>
        <ol>
            <li><strong>Check Responsiveness:</strong> Gently tap and shout to see if the child responds.</li>
            <li><strong>Call for Help:</strong> Call emergency services. If you are alone and the child is unresponsive, give 2 minutes of care before calling.</li>
            <li><strong>Chest Compressions:</strong> Use one or both hands (depending on the size of the child) to perform compressions in the center of the chest. Press down about 2 inches at a rate of 100-120 compressions per minute.</li>
            <li><strong>Rescue Breaths:</strong> Give 2 gentle breaths after 30 compressions, making sure the chest rises.</li>
            <li><strong>Continue CPR:</strong> Continue the cycle until help arrives or the child recovers.</li>
        </ol>

        <h3>Infant CPR (for infants under 1 year)</h3>
        <ol>
            <li><strong>Check Responsiveness:</strong> Tap the infant’s foot and call their name.</li>
            <li><strong>Call for Help:</strong> If alone, give 2 minutes of CPR before calling emergency services.</li>
            <li><strong>Chest Compressions:</strong> Use two fingers in the center of the chest, just below the nipple line. Press down about 1.5 inches at a rate of 100-120 compressions per minute.</li>
            <li><strong>Rescue Breaths:</strong> Cover the infant's mouth and nose with your mouth and give 2 gentle breaths. Each breath should last about 1 second.</li>
            <li><strong>Continue CPR:</strong> Continue the cycle until help arrives or the infant recovers.</li>
        </ol>

        <figure>
            <img src="images/cpr-infant.jpg" alt="Diagram of infant CPR procedure">
            <figcaption>Diagram showing the steps for performing CPR on an infant.</figcaption>
        </figure>
    </section>

    <footer>
        <!--Memangil footer-->
        <?php include ('footer.php'); ?>
    </footer>
</body>
</html>
