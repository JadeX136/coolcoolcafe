<?php echo form_open_multipart(base_url('/Order/add_to_cart'));?>
<div class="mb-3">
<input type="hidden" name="product_id" value="<?php echo $id;?>">
    <input type="hidden" name="nameMenu" value="<?php echo $nameTH;?>">
    <input type="hidden" name="formtype" value="<?php echo $formtype;?>">
    <label class="form-label fw-bold" for="Coffee_Bean">Coffee Bean</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="espressoShots" data-desc="Brazil Santos คั่วกลาง-เข้ม(darkChocolate,Nutty,Creamy)" id="flexRadioDefault1" value="0" onchange="updateSummary()">
        <label class="form-check-label" for="flexRadioDefault1">Brazil Santos คั่วกลาง-เข้ม(darkChocolate,Nutty,Creamy) +0 บาท</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="espressoShots" data-desc="Brazil Santos คั่วเข้ม(darkChocolate,Nutty,Creamy) " id="flexRadioDefault2" value="0"  onchange="updateSummary()" >
        <label class="form-check-label" for="flexRadioDefault2">Brazil Santos คั่วเข้ม(darkChocolate,Nutty,Creamy) +0 บาท</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="espressoShots" id="flexRadioDefault2" value="50" data-desc="Whiskey & Rum คั่วอ่อน-กลาง (Whiskey,Rum raisin,Vanilla,Chocolate)" onchange="updateSummary()">
        <label class="form-check-label" for="flexRadioDefault2">Whiskey & Rum คั่วอ่อน-กลาง (Whiskey,Rum raisin,Vanilla,Chocolate) +50 บาท</label>
    </div>
    <input type="hidden" name="espressoPrice" id="espressoPrice">
    <input type="hidden" name="espressoDescription" id="espressoDescription">
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
            <button class="btn btn-success" type="submit" name="submit" id="orderSummary">ใส่ตระกร้า : 45 บาท</button>
            <input type="hidden" name="price" id="price">
        </div>
    </div>
<?php echo form_close();?>
<script>
    function updateSummary() {
        var espressoShotsInput = document.querySelector('input[name="espressoShots"]:checked');
        var espressoPrice = espressoShotsInput ? espressoShotsInput.value : 0;
        var espressoDescription = espressoShotsInput ? espressoShotsInput.getAttribute('data-desc') : '';
        document.getElementById('espressoPrice').value = espressoPrice;
        document.getElementById('espressoDescription').value = espressoDescription;
        var espressoShots = espressoShotsInput ? parseInt(espressoShotsInput.value) : 0; // Default to 0 if no espresso shots are selected
    
        var quantity = parseInt(document.getElementById('quantity').value);
        var basePrice = 65;
        var totalCost = (espressoShots + basePrice) * quantity;
        console.log("Quantity: " + quantity);
        console.log("EspressoShot: " + espressoShots);
        console.log("Espresso description: " + espressoDescription);
        console.log("Total cost: " + totalCost);
        document.getElementById('price').value = totalCost;
    document.getElementById("orderSummary").innerHTML = "ใส่ตระกร้า : " + totalCost.toFixed(2) + " บาท";
    }
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