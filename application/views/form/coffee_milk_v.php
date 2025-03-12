
<?php echo form_open_multipart(base_url('/Order/add_to_cart'));?>
<div class="mb-3">
    <input type="hidden" name="product_id" value="<?php echo $id;?>">
    <input type="hidden" name="nameMenu" value="<?php echo $nameEN;?>"> 
    <input type="hidden" name="formtype" value="<?php echo $formtype;?>">
    <label class="form-label fw-bold" for="Coffee_Bean">Coffee Bean</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="espressoShots" id="flexRadioDefault1" value="0" data-desc="Brazil Santos คั่วกลาง-เข้ม(darkChocolate,Nutty,Creamy)" onchange="updateSummary()">
        <label class="form-check-label" for="flexRadioDefault1">Brazil Santos คั่วกลาง-เข้ม(darkChocolate,Nutty,Creamy) +0 บาท</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="espressoShots" id="flexRadioDefault2" value="0" data-desc="Brazil Santos คั่วเข้ม(darkChocolate,Nutty,Creamy)" onchange="updateSummary()" >
        <label class="form-check-label" for="flexRadioDefault2">Brazil Santos คั่วเข้ม(darkChocolate,Nutty,Creamy) +0 บาท</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="espressoShots" id="flexRadioDefault2" value="50"  data-desc="Whiskey & Rum คั่วอ่อน-กลาง (Whiskey,Rum raisin,Vanilla,Chocolate)"  onchange="updateSummary()">
        <label class="form-check-label" for="flexRadioDefault2">Whiskey & Rum คั่วอ่อน-กลาง (Whiskey,Rum raisin,Vanilla,Chocolate) +50 บาท</label>
    </div>
    <input type="hidden" name="espressoPrice" id="espressoPrice">
    <input type="hidden" name="espressoDescription" id="espressoDescription">
</div>
<div class="mb-3">
    <label class="form-label fw-bold" for="sweetness">ความหวาน</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="sweetness" id="sweetness1" value="125% หวานมาก">
        <label class="form-check-label" for="sweetness">125% หวานมาก</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="sweetness" id="sweetness2" value="100% หวานปกติ">
        <label class="form-check-label" for="sweetness">100% หวานปกติ</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="sweetness" id="sweetness3" value="75% หวานน้อย">
        <label class="form-check-label" for="sweetness">75% หวานน้อย</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="sweetness" id="sweetness4" value="50% หวานน้อยกว่า">
        <label class="form-check-label" for="sweetness">50% หวานน้อยกว่า</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="sweetness" id="sweetness5" value="25% หวานน้อยมาก">
        <label class="form-check-label" for="sweetness">25% หวานน้อยมาก</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="sweetness" id="sweetness6" value="0% ไม่มีความหวานใด">
        <label class="form-check-label" for="sweetness">0% ไม่มีความหวานใด</label>
    </div>
</div>
<div class="mb-3">
    <label class="form-label fw-bold" for="milk">ชนิดนม</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="milk" id="milk1" value="0" data-desc="นมวัวแท้ 100%" onchange="updateSummary()">
        <label class="form-check-label" for="radio">นมวัว 100%</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="milk" id="milk2" value="15" data-desc="OATSIDE"  onchange="updateSummary()">
        <label class="form-check-label" for="milk">OATSIDE +10 บาท</label>
    </div>
    <input type="hidden" name="milkvalue" id="milkvalue">
    <input type="hidden" name="milkname" id="milkname">
</div>
<div class="row">
        <div class="col-5 mb-3">
        <div class="input-group">
            <button class="btn btn-outline-secondary btn-minus" type="button" onclick="decreaseQuantity()">-</button>
            <input type="text" name="quantity" id="quantity" class="form-control text-center" value="1" readonly onchange="updateSummary()">
            <button class="btn btn-outline-secondary btn-plus" type="button" onclick="increaseQuantity()">+</button>
        </div>
</div>
        <div class="mb-3 col-7">
            <button class="btn btn-success" type="submit" name="submit" id="orderSummary">เริ่มต้น <?php echo $basePrice;?> บาท</button>
            <input type="hidden" name="price" id="price">
        </div>
    </div>
<?php echo form_close();?>

<script>
    function updateSummary() {
    var milkInput = document.querySelector('input[name="milk"]:checked');
    var espressoShotsInput = document.querySelector('input[name="espressoShots"]:checked');
    
    // Store selected espresso shot value and description
    var espressoPrice = espressoShotsInput ? espressoShotsInput.value : 0;
    var espressoDescription = espressoShotsInput ? espressoShotsInput.getAttribute('data-desc') : '';
    
    // Set hidden input values
    document.getElementById('espressoPrice').value = espressoPrice;
    document.getElementById('espressoDescription').value = espressoDescription;

    var milkvalue = milkInput ? milkInput.value : 0;
    var milkname = milkInput ? milkInput.getAttribute('data-desc') : '';

    //set hidden input values
    document.getElementById('milkvalue').value = milkvalue;
    document.getElementById('milkname').value = milkname;
    
    var milk = milkInput ? parseInt(milkInput.value) : 0; // Default to 0 if no milk is selected
    var espressoShots = espressoShotsInput ? parseInt(espressoShotsInput.value) : 0; // Default to 0 if no espresso shots are selected
    
    var quantity = parseInt(document.getElementById('quantity').value);
    var basePrice = <?php echo $basePrice;?>;

    // Calculate total cost
    var totalCost = (milk + espressoShots + basePrice) * quantity;
    console.log("Milk price: " + milk);
    console.log("Quantity: " + quantity);
    console.log("EspressoShot: " + espressoShots);
    console.log("Espresso description: " + espressoDescription);
    console.log("Total cost: " + totalCost);
    console.log("BasePrice: " + basePrice);
    document.getElementById('price').value = totalCost
    document.getElementById("orderSummary").innerHTML = "ใส่ตระกร้า : " + totalCost.toFixed(2) + " บาท";
}

    // function updateSummary(){
    
    //     var milkInput = document.querySelector('input[name="milk"]:checked');
    //     var espressoShotsInput = document.querySelector('input[name="espressoShots"]:checked');
    
        
    //     // Check if milk and espressoShots have been selected
    //     var milk = milkInput ? parseInt(milkInput.value) : 0; // Default to 0 if no milk is selected
    //     var espressoShots = espressoShotsInput ? parseInt(espressoShotsInput.value) : 0; // Default to 0 if no espresso shots are selected
    
    //     var quantity = parseInt(document.getElementById('quantity').value);
    //     var basePrice = 45;
    
    //     // Calculate total cost
    //     var totalCost = (milk + espressoShots + basePrice) * quantity;
    //     console.log("Milk price: " + milk);
    //     console.log("Quantity: " + quantity);
    //     console.log("EspressoShot: " + espressoShots);
    //     console.log("Total cost: " + totalCost);
    //     document.getElementById("orderSummary").innerHTML = "ใส่ตระกร้า : " + totalCost.toFixed(2) + " บาท";
    // }
    function decreaseQuantity() {
        var quantityInput = document.getElementById('quantity');
        var currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
            updateSummary();  // Update the total when quantity decreases
        }
    }

    function increaseQuantity() {
        var quantityInput = document.getElementById('quantity');
        var currentValue = parseInt(quantityInput.value);
        quantityInput.value = currentValue + 1;
        updateSummary();  // Update the total when quantity increases
    }
</script>