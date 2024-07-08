<?php
  include("../config/connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
    include("config/head-data.php");
  ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

  <style>
    .text-danger {
      display: none;
    }
  </style>

<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
<script>
  function validateForm() {
    let form = document.forms["dataForm"];
    let valid = true;

    function checkField(fieldName, labelId) {
      let field = form[fieldName].value;
      let label = document.getElementById(labelId);
      if (!field) {
        label.style.display = 'block';
        valid = false;
      } else {
        label.style.display = 'none';
      }
    }

    // Validate each field
    checkField("place", "place_validation");
    checkField("supplier_name", "supplier_name_validation");
    checkField("product_name", "product_name_validation");
    checkField("quality", "quality_validation");
    checkField("bags", "bags_validation");
    checkField("each_bag_weight", "each_bag_weight_validation");
    checkField("rate", "rate_validation");
    checkField("om_exim_weighbridge_weight", "om_exim_weighbridge_weight_validation");
    checkField("other_weighbridge_weight", "other_weighbridge_weight_validation");
    checkField("weight_as_per_average_bag_weight", "weight_as_per_average_bag_weight_validation");
    checkField("bill_weight", "bill_weight_validation");
    checkField("weight_supervisor_name", "weight_supervisor_name_validation");
    checkField("quality_supervisor_name", "quality_supervisor_name_validation");
    checkField("vehicle_no", "vehicle_no_validation");
    checkField("container_no", "container_no_validation");
    checkField("remarks", "remarks_validation");

    // Custom validation for numeric values
    // function checkNumericField(fieldName, labelId) {
    //   let field = form[fieldName].value;
    //   if (field <= 0) {
    //     alert("Numeric values must be greater than zero.");
    //     document.getElementById(labelId).style.display = 'block';
    //     valid = false;
    //   }
    // }

    // checkNumericField("bags", "bags_validation");
    // checkNumericField("each_bag_weight", "each_bag_weight_validation");
    // checkNumericField("rate", "rate_validation");
    // checkNumericField("om_exim_weighbridge_weight", "om_exim_weighbridge_weight_validation");
    // checkNumericField("other_weighbridge_weight", "other_weighbridge_weight_validation");
    // checkNumericField("weight_as_per_average_bag_weight", "weight_as_per_average_bag_weight_validation");
    // checkNumericField("bill_weight", "bill_weight_validation");

    const formFields = [
    "place", "supplier_name", "product_name", "quality", "bags", 
    "each_bag_weight", "rate", "om_exim_weighbridge_weight", 
    "other_weighbridge_weight", "weight_as_per_average_bag_weight", 
    "bill_weight", "weight_supervisor_name", "quality_supervisor_name", 
    "vehicle_no", "container_no", "remarks"
  ];

  formFields.forEach(fieldName => {
    document.getElementById(fieldName).onchange = function() {
      validateForm(false);
    };
  });


    
    return valid;
  }
</script>

</head>

<body>

  <?php
    include("layout/header.php");
    include("layout/aside.php");
  ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Inward Form</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>
              <form  name="dataForm" method="post" action="" onsubmit="return validateForm(true)">
                

                <div class="row mb-4">
                  <label for="place" class="col-sm-2 col-form-label">Place</label>
                  <div class="col-sm-10">
                    <input type="text" placeholder="Enter Place" class="form-control" id="place" name="place">
                    <label id="place_validation" class="text-danger"><small>*Enter Place</small></label>
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="supplier_name" class="col-sm-2 col-form-label">Supplier Name</label>
                  <div class="col-sm-10">
                    <input type="text" placeholder="Enter Supplier Name" class="form-control" id="supplier_name" name="supplier_name">
                    <label id="supplier_name_validation" class="text-danger"><small>*Enter Supplier Name</small></label>
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="product_name" class="col-sm-2 col-form-label">Product Name</label>
                  <div class="col-sm-10">
                    <!-- <input type="text" placeholder="Enter Product Name" class="form-control" id="product_name" name="product_name"> -->
                    <select class="form-select dropdown-class" aria-label="Default select example" id="product_name" name="product_name">
                      <option value="" selected disabled>- - Select Product - -</option>
                      <option value="Ajwain Seeds">Ajwain Seeds</option>
                      <option value="AjinoMoto (MSG)">AjinoMoto (MSG)</option>
                      <option value="Amchur Powder">Amchur Powder</option>
                      <option value="Anardana Powder">Anardana Powder</option>
                      <option value="Anardana Whole">Anardana Whole</option>
                      <option value="Basil Seeds (Tukmaria)">Basil Seeds (Tukmaria)</option>
                      <option value="Bay Leaves">Bay Leaves</option>
                      <option value="Black Pepper Powder">Black Pepper Powder</option>
                      <option value="Black Pepper Whole">Black Pepper Whole</option>
                      <option value="Black Salt">Black Salt</option>
                      <option value="Cardamom Black">Cardamom Black</option>
                      <option value="Black Cardamom Whole">Black Cardamom Whole</option>
                      <option value="Cardamom Jumbo">Cardamom Jumbo</option>
                      <option value="Citric Acid">Citric Acid</option>
                      <option value="Chili Powder Kashmiri">Chili Powder Kashmiri</option>
                      <option value="Chili Powder Regular">Chili Powder Regular</option>
                      <option value="Chili Powder Ex-Hot">Chili Powder Ex-Hot</option>
                      <option value="Chili Round Whole">Chili Round Whole</option>
                      <option value="Chili Whole Sanam (With Stem)">Chili Whole Sanam (With Stem)</option>
                      <option value="Chili Whole Ex-Hot (Teja)">Chili Whole Ex-Hot (Teja)</option>
                      <option value="Chili Whole Ex-Hot (Teja) (With Stem)">Chili Whole Ex-Hot (Teja) (With Stem)</option>
                      <option value="Chilli Whole Sanam (With Stemless)">Chilli Whole Sanam (With Stemless)</option>
                      <option value="Chili Crushed Pepper">Chili Crushed Pepper</option>
                      <option value="Cinnamon Flat">Cinnamon Flat</option>
                      <option value="Cinnamon Powder">Cinnamon Powder</option>
                      <option value="Cinnamon Sticks Round">Cinnamon Sticks Round</option>
                      <option value="Cinnamon Stick">Cinnamon Stick</option>
                      <option value="Cloves Powder">Cloves Powder</option>
                      <option value="Cloves Powder">Cloves Powder</option>
                      <option value="Cloves Whole">Cloves Whole</option>
                      <option value="Coriander Powder">Coriander Powder</option>
                      <option value="Coriander Seeds">Coriander Seeds</option>
                      <option value="Cumin Powder">Cumin Powder</option>
                      <option value="Cumin Seeds">Cumin Seeds</option>
                      <option value="Cumin-Coriander Powder">Cumin-Coriander Powder</option>
                      <option value="Curry Powder">Curry Powder</option>
                      <option value="Curd Chili">Curd Chili</option>
                      <option value="Dill Seeds">Dill Seeds</option>
                      <option value="Dhana Dal">Dhana Dal</option>
                      <option value="Fennel Lucknowi">Fennel Lucknowi</option>
                      <option value="Fennel Roasted">Fennel Roasted</option>
                      <option value="Fennel Powder">Fennel Powder</option>
                      <option value="Fennel Seeds">Fennel Seeds</option>
                      <option value="Fennel Sugar Coated">Fennel Sugar Coated</option>
                      <option value="Fenugreek Powder">Fenugreek Powder</option>
                      <option value="Fenugreek Seeds">Fenugreek Seeds</option>
                      <option value="Flax Seeds">Flax Seeds</option>
                      <option value="Garam Masala Powder">Garam Masala Powder</option>
                      <option value="Garam Masala Whole">Garam Masala Whole</option>
                      <option value="Garlic Granulated">Garlic Granulated</option>
                      <option value="Garlic Powder">Garlic Powder</option>
                      <option value="Ginger Powder">Ginger Powder</option>
                      <option value="Javantri (Mace) Pwd">Javantri (Mace) Pwd</option>
                      <option value="Javantri (Mace) Whole">Javantri (Mace) Whole</option>
                      <option value="Kala Jeera">Kala Jeera</option>
                      <option value="Kalonji">Kalonji</option>
                      <option value="Kokum Black Desi (Wet)">Kokum Black Desi (Wet)</option>
                      <option value="Lonavala Kokum (Black Kokum)">Lonavala Kokum (Black Kokum)</option>
                      <option value="Moong Wadi">Moong Wadi</option>
                      <option value="Mustard Seeds">Mustard Seeds</option>
                      <option value="Mustard Andhra Seeds">Mustard Andhra Seeds</option>
                      <option value="Nutmeg Powder">Nutmeg Powder</option>
                      <option value="Nutmeg Whole">Nutmeg Whole</option>
                      <option value="Panchpuran">Panchpuran</option>
                      <option value="Paprika">Paprika</option>
                      <option value="Poppy Seeds">Poppy Seeds</option>
                      <option value="Pipli Round">Pipli Round</option>
                      <option value="Sesame Seeds Black">Sesame Seeds Black</option>
                      <option value="Sesame Seeds Hulled">Sesame Seeds Hulled</option>
                      <option value="Sesame Hulled">Sesame Hulled</option>
                      <option value="Sesame Seeds (Natural)">Sesame Seeds (Natural)</option>
                      <option value="Shah Jeera">Shah Jeera</option>
                      <option value="Soya Wadi">Soya Wadi</option>
                      <option value="Star Anis">Star Anis</option>
                      <option value="Turmeric Powder">Turmeric Powder</option>
                      <option value="Turmeric Whole">Turmeric Whole</option>
                      <option value="White Pepper Powder">White Pepper Powder</option>
                      <option value="White Pepper Whole">White Pepper Whole</option>
                      <option value="Mint Leaves (Pudina)">Mint Leaves (Pudina)</option>
                      <option value="Black Beans">Black Beans</option>
                      <option value="Black Eye Beans">Black Eye Beans</option>
                      <option value="Brown Chori">Brown Chori</option>
                      <option value="Chana Dal">Chana Dal</option>
                      <option value="Dark Red Kidney Beans">Dark Red Kidney Beans</option>
                      <option value="Desi Val">Desi Val</option>
                      <option value="Green Vatana Whole">Green Vatana Whole</option>
                      <option value="Horse Gram">Horse Gram</option>
                      <option value="Kabuli Chana">Kabuli Chana</option>
                      <option value="Kashmiri Rajama">Kashmiri Rajama</option>
                      <option value="Light Red Kidney Beans">Light Red Kidney Beans</option>
                      <option value="Masoor Dal">Masoor Dal</option>
                      <option value="Masoor Gota">Masoor Gota</option>
                      <option value="Masoor Whole">Masoor Whole</option>
                      <option value="Moong Chilka">Moong Chilka</option>
                      <option value="Moong Dal">Moong Dal</option>
                      <option value="Moong Whole">Moong Whole</option>
                      <option value="Moth">Moth</option>
                      <option value="Red Chori">Red Chori</option>
                      <option value="Toor Dal">Toor Dal</option>
                      <option value="Toor Whole">Toor Whole</option>
                      <option value="Udad Chilka">Udad Chilka</option>
                      <option value="Udad Dal">Udad Dal</option>
                      <option value="Udad Gota">Udad Gota</option>
                      <option value="Idli Dosa Dal">Idli Dosa Dal</option>
                      <option value="Udad Whole">Udad Whole</option>
                      <option value="Val Dal">Val Dal</option>
                      <option value="Yellow Vatana Split">Yellow Vatana Split</option>
                      <option value="Yellow Whole Vatana">Yellow Whole Vatana</option>
                      <option value="Bajri Flour">Bajri Flour</option>
                      <option value="Besan (India 100% Pure Chana Dal)">Besan (India 100% Pure Chana Dal)</option>
                      <option value="Bhakari Flour">Bhakari Flour</option>
                      <option value="Idli Rava">Idli Rava</option>
                      <option value="Jowar Flour">Jowar Flour</option>
                      <option value="Krishna Kamod Rice Flour">Krishna Kamod Rice Flour</option>
                      <option value="Ladu Besan">Ladu Besan</option>
                      <option value="Maida Flour">Maida Flour</option>
                      <option value="Ragi Flour">Ragi Flour</option>
                      <option value="Rice Flour">Rice Flour</option>
                      <option value="Sooji Coarse">Sooji Coarse</option>
                      <option value="Sooji Fine">Sooji Fine</option>
                      <option value="Moraiyo Flour">Moraiyo Flour</option>
                      <option value="Rajgaro Flour">Rajgaro Flour</option>
                      <option value="Singoda Flour">Singoda Flour</option>
                      <option value="Gota Besan">Gota Besan</option>
                      <option value="Khaman Mix">Khaman Mix</option>
                      <option value="Almond Sliced">Almond Sliced</option>
                      <option value="Almond Whole">Almond Whole</option>
                      <option value="Anjeer (Figs)">Anjeer (Figs)</option>
                      <option value="Cashew Split">Cashew Split</option>
                      <option value="Cashew Whole">Cashew Whole</option>
                      <option value="Coconut Powder Macaroon">Coconut Powder Macaroon</option>
                      <option value="Coconut Powder Medium">Coconut Powder Medium</option>
                      <option value="Dried Coconut Kernels Whole">Dried Coconut Kernels Whole</option>
                      <option value="Coconut Shredded">Coconut Shredded</option>
                      <option value="Green Pistachios">Green Pistachios</option>
                      <option value="Shell Pistachios">Shell Pistachios</option>
                      <option value="Green Raisin">Green Raisin</option>
                      <option value="Golden Raisin">Golden Raisin</option>
                      <option value="Spanish Peanut">Spanish Peanut</option>
                      <option value="Walnut Halves">Walnut Halves</option>
                      <option value="Dried Coconut Halves">Dried Coconut Halves</option>
                      <option value="Phool Makhana">Phool Makhana</option>
                      <option value="Organic Red Quinoa">Organic Red Quinoa</option>
                      <option value="Organic Red Quinoa (Bottle)">Organic Red Quinoa (Bottle)</option>
                      <option value="Organic White Quinoa (Bottle)">Organic White Quinoa (Bottle)</option>
                      <option value="Organic Chia Bottle">Organic Chia Bottle</option>
                      <option value="Fada (Cracked Wheat)">Fada (Cracked Wheat)</option>
                      <option value="Fine Fada (Kansar)">Fine Fada (Kansar)</option>
                      <option value="Crack Wheat (Kansar)">Crack Wheat (Kansar)</option>
                      <option value="Red Poha Thin (Aval)">Red Poha Thin (Aval)</option>
                      <option value="Dagadi Poha">Dagadi Poha</option>
                      <option value="Dalia Split">Dalia Split</option>
                      <option value="Poha Corn">Poha Corn</option>
                      <option value="Poha Thick">Poha Thick</option>
                      <option value="Poha Thin">Poha Thin</option>
                      <option value="Sabudana (Sago)">Sabudana (Sago)</option>
                      <option value="Red Poha Thin (Aval)">Red Poha Thin (Aval)</option>
                      <option value="Sabudana (Sago)">Sabudana (Sago)</option>
                      <option value="Kolhapuri Mamra">Kolhapuri Mamra</option>
                      <option value="Surti Mamra">Surti Mamra</option>
                      <option value="Mysore Murmura">Mysore Murmura</option>
                      <option value="Basmati Mamra">Basmati Mamra</option>
                      <option value="Bajra Murmura">Bajra Murmura</option>
                      <option value="Juwar Mamra">Juwar Mamra</option>
                      <option value="Ragi Mamra">Ragi Mamra</option>
                      <option value="Wheat Murmura">Wheat Murmura</option>
                      <option value="Jaggery Cube">Jaggery Cube</option>
                      <option value="Palm Jaggery">Palm Jaggery</option>
                      <option value="Jaggery Powder">Jaggery Powder</option>
                      <option value="Kolhapuri Jaggery">Kolhapuri Jaggery</option>
                      <option value="Natural Jaggery">Natural Jaggery</option>
                      <option value="Palm Sugar (Bottle)">Palm Sugar (Bottle)</option>
                      <option value="Coconut Sugar (Bottle)">Coconut Sugar (Bottle)</option>
                      <option value="Palm Candy (Bottle)">Palm Candy (Bottle)</option>
                      <option value="Sakriya">Sakriya</option>
                      <option value="Desi Sugar">Desi Sugar</option>
                      <option value="Desi Bura Sugar">Desi Bura Sugar</option>
                      <option value="Jaggery Powder">Jaggery Powder</option>
                      <option value="Sugar Candy (Medium)">Sugar Candy (Medium)</option>
                      <option value="Bombay Cut Mishri">Bombay Cut Mishri</option>
                      <option value="Sugar Brown Cane">Sugar Brown Cane</option>
                      <option value="Brown Sugar (Pouch)">Brown Sugar (Pouch)</option>
                      <option value="Sugar Organic">Sugar Organic</option>
                      <option value="Idli Chutney">Idli Chutney</option>
                      <option value="Red Coconut Chutney">Red Coconut Chutney</option>
                      <option value="Tomato Coconut Chutney">Tomato Coconut Chutney</option>
                      <option value="Mint Coconut Chutney">Mint Coconut Chutney</option>
                      <option value="Green Coconut Chutney">Green Coconut Chutney</option>
                      <option value="Sesame Chutney">Sesame Chutney</option>
                      <option value="Groundnut Chutney">Groundnut Chutney</option>
                      <option value="Paruppu Podi Powder">Paruppu Podi Powder</option>
                      <option value="Curry Leaves Idli Podi">Curry Leaves Idli Podi</option>
                      <option value="Vathakuzhambu Mix Powder">Vathakuzhambu Mix Powder</option>
                      <option value="Sundakkai Vathal">Sundakkai Vathal</option>
                      <option value="Curry Leaves Rice Powder">Curry Leaves Rice Powder</option>
                      <option value="Fryums Bhindi Cut (Color)">Fryums Bhindi Cut (Color)</option>
                      <option value="Fryums Bhindi Cut (Plain)">Fryums Bhindi Cut (Plain)</option>
                      <option value="Fryums Round (Colour)">Fryums Round (Colour)</option>
                      <option value="Fryums Round (Plain)">Fryums Round (Plain)</option>
                      <option value="Fryums Star (Color)">Fryums Star (Color)</option>
                      <option value="Fryums Star (Plain)">Fryums Star (Plain)</option>
                      <option value="Fryums Wheel (Color)">Fryums Wheel (Color)</option>
                      <option value="Fryums Wheel (Plain)">Fryums Wheel (Plain)</option>
                      <option value="Fryums Pipe (Color)">Fryums Pipe (Color)</option>
                      <option value="Fryums Pipe (Plain)">Fryums Pipe (Plain)</option>
                      <option value="Pani Puri">Pani Puri</option>
                      <option value="Cookies Cashew Nut">Cookies Cashew Nut</option>
                      <option value="Cookies Fruit and Nuts">Cookies Fruit and Nuts</option>
                      <option value="Cookies Chocolate Crunch">Cookies Chocolate Crunch</option>
                      <option value="Cookies Almond and Coconut">Cookies Almond and Coconut</option>
                      <option value="Chocolate Sandwich Pak">Chocolate Sandwich Pak</option>
                      <option value="Chocolate Pak">Chocolate Pak</option>
                      <option value="Peanut Pak">Peanut Pak</option>
                      <option value="Sesame Laddu (Sesame Balls)">Sesame Laddu (Sesame Balls)</option>
                      <option value="Nelakadale Laddu (Peanut Balls)">Nelakadale Laddu (Peanut Balls)</option>
                      <option value="Mango (Aam) Chutney">Mango (Aam) Chutney</option>
                      <option value="Malabar Tamarind">Malabar Tamarind</option>
                      <option value="Tamarind Slab">Tamarind Slab</option>
                      <option value="Minced Garlic">Minced Garlic</option>
                      <option value="Soya Chaap">Soya Chaap</option>
                      <option value="Kesar Mango Pulp">Kesar Mango Pulp</option>
                      <option value="Alphonso Mango Pulp">Alphonso Mango Pulp</option>
                      <option value="Alphonso 100% Natural">Alphonso 100% Natural</option>
                      <option value="Fried Onion (With Coated)">Fried Onion (With Coated)</option>
                      <option value="Fried Onion (Without Coated)">Fried Onion (Without Coated)</option>
                      <option value="Ginger Garlic Paste">Ginger Garlic Paste</option>
                      <option value="Handmade Khari Jeera">Handmade Khari Jeera</option>
                      <option value="Handmade Khari Masala">Handmade Khari Masala</option>
                      <option value="L G Hing">L G Hing</option>
                      <option value="Telephone Isabgul">Telephone Isabgul</option>
                      <option value="Handmade Khari Plain">Handmade Khari Plain</option>
                      <option value="Handmade Khari Whole Wheat">Handmade Khari Whole Wheat</option>
                      <option value="Khari Singh (Salted Peanuts)">Khari Singh (Salted Peanuts)</option>
                      <option value="Kewra Water">Kewra Water</option>
                      <option value="Rose Water">Rose Water</option>
                      <option value="Saffola Classic Masala Oats">Saffola Classic Masala Oats</option>
                      <option value="Saffola Masala Coriander Oats">Saffola Masala Coriander Oats</option>
                      <option value="Saffola Peppy Tomato Oats">Saffola Peppy Tomato Oats</option>
                      <option value="Saffola Veggie Twist Oats">Saffola Veggie Twist Oats</option>
                      <option value="Saffola Gold Edible">Saffola Gold Edible</option>
                      <option value="Bambino Vermicelli Raw">Bambino Vermicelli Raw</option>
                      <option value="Bambino Vermicelli Roasted">Bambino Vermicelli Roasted</option>
                    </select>
                    <label id="product_name_validation" class="text-danger"><small>*Select Product Name</small></label>
                  </div>
                </div>

                <script>
                  $(document).ready(function() {
                    $('#product_name').select2();
                  });
                </script>

                <div class="row mb-4">
                  <label for="quality" class="col-sm-2 col-form-label">Quality</label>
                  <div class="col-sm-10">
                    <input type="text" placeholder="Enter Quality" class="form-control" id="quality" name="quality">
                    <label id="quality_validation" class="text-danger"><small>*Enter Quality</small></label>
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="bags" class="col-sm-2 col-form-label">Bags</label>
                  <div class="col-sm-10">
                    <input type="number" placeholder="Enter Bags" class="form-control" id="bags" name="bags">
                    <label id="bags_validation" class="text-danger"><small>*Enter Bags</small></label>
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="each_bag_weight" class="col-sm-2 col-form-label">Total KG</label>
                  <div class="col-sm-10">
                    <input type="number" step="0.00000000001" placeholder="Enter Total KG" class="form-control" id="each_bag_weight" name="each_bag_weight">
                    <label id="each_bag_weight_validation" class="text-danger"><small>*Enter Total KG</small></label>
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="rate" class="col-sm-2 col-form-label">Rate</label>
                  <div class="col-sm-10">
                    <input type="number" step="0.00000000001" placeholder="Enter Rate" class="form-control" id="rate" name="rate">
                    <label id="rate_validation" class="text-danger"><small>*Enter Rate</small></label>
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="om_exim_weighbridge_weight" class="col-sm-2 col-form-label">OM Exim Weighbridge Weight</label>
                  <div class="col-sm-10">
                    <input type="number" step="0.00000000001" placeholder="Enter OM Exim Weighbridge Weight" class="form-control" id="om_exim_weighbridge_weight" name="om_exim_weighbridge_weight">
                    <label id="om_exim_weighbridge_weight_validation" class="text-danger"><small>*Enter OM Exim Weighbridge Weight</small></label>
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="other_weighbridge_weight" class="col-sm-2 col-form-label">Other Weighbridge Weight</label>
                  <div class="col-sm-10">
                    <input type="number" step="0.00000000001" placeholder="Enter Other Weighbridge Weight" class="form-control" id="other_weighbridge_weight" name="other_weighbridge_weight">
                    <label id="other_weighbridge_weight_validation" class="text-danger"><small>*Enter Other Weighbridge Weight</small></label>
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="weight_as_per_average_bag_weight" class="col-sm-2 col-form-label">Weight as per Average Bag Weight</label>
                  <div class="col-sm-10">
                    <input type="number" step="0.00000000001" placeholder="Enter Weight as per Average Bag Weight" class="form-control" id="weight_as_per_average_bag_weight" name="weight_as_per_average_bag_weight">
                    <label id="weight_as_per_average_bag_weight_validation" class="text-danger"><small>*Enter Weight as per Average Bag Weight</small></label>
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="bill_weight" class="col-sm-2 col-form-label">Bill Weight</label>
                  <div class="col-sm-10">
                    <input type="number" step="0.00000000001" placeholder="Enter Bill Weight" class="form-control" id="bill_weight" name="bill_weight">
                    <label id="bill_weight_validation" class="text-danger"><small>*Enter Bill Weight</small></label>
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="weight_supervisor_name" class="col-sm-2 col-form-label">Weight Supervisor Name</label>
                  <div class="col-sm-10">
                    <!-- <input type="text" placeholder="Enter Weight Supervisor Name" class="form-control" id="weight_supervisor_name" name="weight_supervisor_name"> -->
                    <select class="form-select" aria-label="Default select example" id="weight_supervisor_name" name="weight_supervisor_name">
                      <option value="" selected disabled>- - Select Weight Supervisor Name - -</option>
                      <option value="Jignesh Patel">Jignesh Patel</option>
                      <option value="Kaushal Patel">Kaushal Patel</option>
                      <option value="Dipesh Patel">Dipesh Patel</option>
                      <option value="Rajesh Suthar">Rajesh Suthar</option>
                      <option value="Karan Raval">Karan Raval</option>
                      <option value="Kirti Chavda">Kirti Chavda</option>
                      <option value="Riya Surti">Riya Surti</option>
                      <option value="Dhruv Patel">Dhruv Patel</option>
                      <option value="Rajnikant">Rajnikant</option>
                      <option value="Ramesh Patel">Ramesh Patel</option>
                      <option value="Divakarji">Divakarji</option>
                      <option value="Paresh Lodha">Paresh Lodha</option>
                      <option value="Krushn Damor">Krushn Damor</option>
                      <option value="Meet Patel">Meet Patel</option>
                      <option value="Binoy Prajapati">Binoy Prajapati</option>
                      <option value="Prinjal Patel">Prinjal Patel</option>
                      <option value="Jay Vyas">Jay Vyas</option>
                      <option value="Hardik Panchal">Hardik Panchal</option>
                      <option value="Ronak Patel">Ronak Patel</option>
                      <option value="Shubh">Shubh</option>
                      <option value="Manth Patel">Manth Patel</option>
                      <option value="Vipul Patel">Vipul Patel</option>
                      <option value="Vikram">Vikram</option>
                      <option value="Rameshbhai">Rameshbhai</option>
                    </select>
                    <label id="weight_supervisor_name_validation" class="text-danger"><small>*Select Weight Supervisor Name</small></label>
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="quality_supervisor_name" class="col-sm-2 col-form-label">Quality Supervisor Name</label>
                  <div class="col-sm-10">
                    <!-- <input type="text" placeholder="Enter Quality Supervisor Name" class="form-control" id="quality_supervisor_name" name="quality_supervisor_name"> -->
                    <select class="form-select" aria-label="Default select example" id="quality_supervisor_name" name="quality_supervisor_name">
                      <option value="" selected disabled>- - Select Quality Supervisor Name - -</option>
                      <option value="Jignesh Patel">Jignesh Patel</option>
                      <option value="Kaushal Patel">Kaushal Patel</option>
                      <option value="Dipesh Patel">Dipesh Patel</option>
                      <option value="Rajesh Suthar">Rajesh Suthar</option>
                      <option value="Karan Raval">Karan Raval</option>
                      <option value="Kirti Chavda">Kirti Chavda</option>
                      <option value="Riya Surti">Riya Surti</option>
                      <option value="Dhruv Patel">Dhruv Patel</option>
                      <option value="Rajnikant">Rajnikant</option>
                      <option value="Ramesh Patel">Ramesh Patel</option>
                      <option value="Divakarji">Divakarji</option>
                      <option value="Paresh Lodha">Paresh Lodha</option>
                      <option value="Krushn Damor">Krushn Damor</option>
                      <option value="Meet Patel">Meet Patel</option>
                      <option value="Binoy Prajapati">Binoy Prajapati</option>
                      <option value="Prinjal Patel">Prinjal Patel</option>
                      <option value="Jay Vyas">Jay Vyas</option>
                      <option value="Hardik Panchal">Hardik Panchal</option>
                      <option value="Ronak Patel">Ronak Patel</option>
                      <option value="Shubh">Shubh</option>
                      <option value="Manth Patel">Manth Patel</option>
                      <option value="Vipul Patel">Vipul Patel</option>
                      <option value="Vikram">Vikram</option>
                      <option value="Rameshbhai">Rameshbhai</option>
                    </select>
                    <label id="quality_supervisor_name_validation" class="text-danger"><small>*Select Quality Supervisor Name</small></label>
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="vehicle_no" class="col-sm-2 col-form-label">Vehicle No</label>
                  <div class="col-sm-10">
                    <input type="text" placeholder="Enter Vehicle No" class="form-control" id="vehicle_no" name="vehicle_no">
                    <label id="vehicle_no_validation" class="text-danger"><small>*Enter Vehicle No</small></label>
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="container_no" class="col-sm-2 col-form-label">Container No</label>
                  <div class="col-sm-10">
                    <input type="text" placeholder="Enter Container No" class="form-control" id="container_no" name="container_no">
                    <label id="container_no_validation" class="text-danger"><small>*Enter Container No</small></label>
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="remarks" class="col-sm-2 col-form-label">Remarks</label>
                  <div class="col-sm-10">
                    <input type="text" placeholder="Enter Remarks" class="form-control" id="remarks" name="remarks">
                    <label id="remarks_validation" class="text-danger"><small>*Enter Remarks</small></label>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" name="btnSubmit" class="btn btn-primary">Submit</button>
                  </div>
                </div>

                <!-- <div class="row mb-4">
                  <label class="col-sm-2 col-form-label">Quality</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-4">
                  <label class="col-sm-2 col-form-label">Select</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                </div> -->

              </div>
            </form>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <?php
    include("layout/footer.php");
  ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php
    include("config/footer-data.php");
  ?>

</body>

</html>


<?php
if (isset($_POST['btnSubmit'])) {
    // Capture form data
    $place = mysqli_real_escape_string($conn, $_POST['place']);
    $supplier_name = mysqli_real_escape_string($conn, $_POST['supplier_name']);
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $quality = mysqli_real_escape_string($conn, $_POST['quality']);
    $bags = mysqli_real_escape_string($conn, $_POST['bags']);
    $each_bag_weight = mysqli_real_escape_string($conn, $_POST['each_bag_weight']);
    $rate = mysqli_real_escape_string($conn, $_POST['rate']);
    $om_exim_weighbridge_weight = mysqli_real_escape_string($conn, $_POST['om_exim_weighbridge_weight']);
    $other_weighbridge_weight = mysqli_real_escape_string($conn, $_POST['other_weighbridge_weight']);
    $weight_as_per_average_bag_weight = mysqli_real_escape_string($conn, $_POST['weight_as_per_average_bag_weight']);
    $bill_weight = mysqli_real_escape_string($conn, $_POST['bill_weight']);
    $weight_supervisor_name = mysqli_real_escape_string($conn, $_POST['weight_supervisor_name']);
    $quality_supervisor_name = mysqli_real_escape_string($conn, $_POST['quality_supervisor_name']);
    $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);
    $date = date("Y-m-d H:i:s");  
    $vehicle_no = mysqli_real_escape_string($conn, $_POST['vehicle_no']);
    $container_no = mysqli_real_escape_string($conn, $_POST['container_no']);

  // Prepare and bind
  $stmt = $conn->prepare("INSERT INTO `inward_master`(`place`, `supplier_name`, `product_name`, `quality`, `bags`, `total_kg`, `rate`, `om_exim_weighbridge_weight`, `other_weighbridge_weight`, `weight_as_per_average_bag_weight`, `bill_weight`, `weight_supervisor_name`, `quality_supervisor_name`, `remarks`, `date`, `vehicle_no`, `container_no`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sssssssssssssssss", $place, $supplier_name, $product_name, $quality, $bags, $each_bag_weight, $rate, $om_exim_weighbridge_weight, $other_weighbridge_weight, $weight_as_per_average_bag_weight, $bill_weight, $weight_supervisor_name, $quality_supervisor_name, $remarks, $date, $vehicle_no, $container_no);

  if ($stmt->execute()) {
    echo "New record created successfully";

    $activity_details = "entered inward record";

    $stmt = $conn->prepare("INSERT INTO activity_master (user_id, email, user_type, activity_timestamp, activity_details) VALUES (?, ?, ?, CURRENT_TIMESTAMP, ?)");
    $stmt->bind_param('isss', $_SESSION['id'], $_SESSION['username'], $_SESSION['role'], $activity_details);
    $stmt->execute();

  } else {
      echo "Error: " . $stmt->error;
  }

$stmt->close();

      // Prepare and bind
      $stmt = $conn->prepare("INSERT INTO `inward_master_v2`(`place`, `supplier_name`, `product_name`, `quality`, `bags`, `rate`, `total_kg`, `om_exim_weighbridge_weight`, `other_weighbridge_weight`, `weight_as_per_average_bag_weight`, `bill_weight`, `weight_supervisor_name`, `quality_supervisor_name`, `remarks`, `date`, `vehicle_no`, `container_no`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("sssssssssssssssss", $place, $supplier_name, $product_name, $quality, $bags, $each_bag_weight, $rate, $om_exim_weighbridge_weight, $other_weighbridge_weight, $weight_as_per_average_bag_weight, $bill_weight, $weight_supervisor_name, $quality_supervisor_name, $remarks, $date, $vehicle_no, $container_no);

    $stmt->execute();
    $stmt->close();
    $conn->close(); 
}
?>
