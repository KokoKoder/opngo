# opngo
<h1>opngo test</h1>

<p>The most important part file is located in models/checkout/checkout.php. it's there where were all the checkout logic is handled.
The rest of the code is here to interact with the database and change the price list or send and receice the query to test that the logic works.</p>

<p>You can test the code on the <a href="https://opngo.seobytes.eu/">demo page</a></p>
<h2>Instructions</h2>
<p>You can submit strings of Parking Spot (AAB or AABCDB etc.). 
The backend with reply back with a json object with subtotal by parking spot and the total amount.</p>
<p>You can go back to the app and continue adding parking spot to the session and receive the current total.</p>
<p>Reinitialize the session by using thr dedicated button. It would be an empty order action or a complete order action on the app.</p>
<p>The checkout process take into account special prices.</p>
<p>There is a backend to add or delete parcking spot and special price rules</p>


