 <!-- Sticky Footer -->
 <footer class="sticky-footer d-flex justify-content-around" style="left:0;background-color:#343a40;color:white;">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span style="font-size:16px;font-weight:bold;">مركز الفرج</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class=" scroll-to-top rounded  btn-primary scroll-btn " href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">تسجيل الخروج؟</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">اضغط على "تسجيل خروج"</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">إلغاء</button>
          <a class="btn btn-danger" href="functions/logout.php">تسجيل خروج</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
  



  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

  
  <script>
    $(document).ready(function(){
    
      $("#search").keyup(function(){
        var search = $(this).val();
         
        $.post("functions/search.php",
        {xxsearch : search},
        function(data){
          $("#search-results").html(data);
          $("#search-results").css({"border": "1px solid #ccc","border-radius": "5px","padding": "5px","max-height": "80px","overflow-y": "auto","background-color": "#e9ecef","opacity": "1","cursor":"pointer"});
        })
      })
    });
    $("#search-results").on("click", "div", function() {
    var resultText = $(this).text();
    $("#search").val(resultText);
    $("#search-results").empty(); 
    $("#search-results").css("opacity", "0"); 
  });
             
  </script>
  <script>
    $(document).ready(function(){
    
      $("#product").keyup(function(){
        var product = $(this).val();
         
        $.post("functions/search2.php",
        {xsearch : product},
        function(data2){
          $("#search-result").html(data2);
          $("#search-result").css({"border": "1px solid #ccc","border-radius": "5px","padding": "5px","max-height": "80px","overflow-y": "auto","background-color": "#e9ecef","opacity": "1","cursor":"pointer"});
        })
      })
    });
    $("#search-result").on("click", "div", function() {
    var resultText = $(this).text();
    $("#product").val(resultText);
    $("#search-result").empty(); 
    $("#search-result").css("opacity", "0"); 
  });
             
  </script>
  
  <script>
    $(document).ready(function(){
    
      $("#trade").keyup(function(){
        var trade = $(this).val();
         
        $.post("functions/search_trade.php",
        {tradesearch : trade},
        function(data3){
          $("#search-trade").html(data3);
          $("#search-trade").css({"border": "1px solid #ccc","border-radius": "5px","padding": "5px","max-height": "80px","overflow-y": "auto","background-color": "#e9ecef","opacity": "1","cursor":"pointer"});
        })
      })
    });
    $("#search-trade").on("click", "div", function() {
    var resultText = $(this).text();
    $("#trade").val(resultText);
    $("#search-trade").empty(); 
    $("#search-trade").css("opacity", "0"); 
  });
             
  </script>

  <script>
  function disableInputWhenMaxlength() {
      let input = document.getElementById('phone-number');
      if (input.value.length === 8) {
          input.disabled = true;
      } else {
          input.disabled = false;
      }
  }
  </script>

  
<script>
    $(document).ready(function () {
        var maxProducts = 30; // الحد الأقصى لعدد المنتجات المسموح به

        function searchNewProduct(productField, index) {
            var product = productField.value;
            $.post("functions/search2.php", { xsearch: product }, function (data) {
                $(`#search-find-${index}`).html(data);
                $(`#search-find-${index}`).css({
                    "border": "1px solid #ccc",
                    "border-radius": "5px",
                    "padding": "5px",
                    "max-height": "80px",
                    "overflow-y": "auto",
                    "background-color": "#e9ecef",
                    "opacity": "1",
                    "cursor": "pointer"
                });
            });
        }

        function addProductGroup() {
            var productContainer = document.getElementById("productContainer");
            var productCount = productContainer.querySelectorAll(".product-group").length;

            if (productCount < maxProducts) {
                var productGroup = document.createElement("div");
                productGroup.classList.add("product-group");

                productGroup.innerHTML = `
                    <div class="form-group">
                        <label for="search-product"><b>اسم المنتج </b></label>
                        <input type="text" class="form-control search-product" data-index="${productCount}" name="products[]" multiple required>
                        <div id="search-find-${productCount}"></div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="num1"><b>سعر المنتج</b></label>
                                <input type="number" class="form-control number1" name="prices[]" oninput="updateResult()" required>
                            </div>
                            <div class="col-md-6">
                                <label for="num2"><b>عدد القطع</b></label>
                                <input type="number" class="form-control number2" name="quantities[]" oninput="updateResult()" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="button" class="btn btn-danger del-product-btn" style="margin:0 45%;width: 38px;" value="-">
                    </div>
                `;

                productContainer.appendChild(productGroup);

                // إضافة معالج الحدث للحقل الجديد للبحث عن المنتج
                $(`.search-product[data-index="${productCount}"]`).keyup(function () {
                    searchNewProduct(this, productCount);
                });

                // إضافة معالج الحدث لتحديد المنتج
                $(`#search-find-${productCount}`).on("click", "div", function () {
                    var resultText = $(this).text();
                    $(`.search-product[data-index="${productCount}"]`).val(resultText);
                    $(`#search-find-${productCount}`).empty();
                    $(`#search-find-${productCount}`).css("opacity", "0");
                });

                // إضافة معالج الحدث لحذف مجموعة المنتج
                $(document).on("click", ".btn-danger.del-product-btn", function () {
                    var productGroup = $(this).closest(".product-group");
                    productGroup.find(".search-product").val("");
                    productGroup.find(".number1").val("");
                    productGroup.find(".number2").val("");
                    productGroup.remove();
                    updateResult(); // Recalculate when a product is removed
                });
            } else {
                alert("لا يمكنك إضافة المزيد من المنتجات.");
            }
        }

        // إضافة معالج الحدث لزر إضافة المنتج
        $("#addProductBtn").click(addProductGroup);

        // Function to calculate the result
        function updateResult() {
            var num1Elements = document.querySelectorAll(".number1");
            var num2Elements = document.querySelectorAll(".number2");
            var totalProduct = 0;

            for (var i = 0; i < num1Elements.length; i++) {
                var num1 = parseFloat(num1Elements[i].value);
                var num2 = parseFloat(num2Elements[i].value);
                if (!isNaN(num1) && !isNaN(num2)) {
                    totalProduct += num1 * num2;
                }
            }

            var resultElement = document.getElementById("result");
            resultElement.value = totalProduct; // Display result with 2 decimal places
        }

        // Attach keyup event handlers to number1 and number2 fields
        $(document).on("keyup", ".number1, .number2", function () {
            updateResult();
        });
    });
</script>



    </script>

<!-- <script>
	function multiply() {
		var num1 = document.getElementById("num1").value;
		var num2 = document.getElementById("num2").value;
		var result = document.getElementById("result");

		if (num1 && num2) {
			result.value = (num1 * num2);
		} else {
			result.value = "";
		}
	}
</script> -->

  <script>
    const num1Input = document.getElementById('result');
    const num2Input = document.getElementById('num3');
    const result2 = document.getElementById('result2');
    const result3 = document.getElementById('result3');


    [num1Input, num2Input].forEach(input => {
    input.addEventListener('input', () => {
    const num1 = parseFloat(num1Input.value) || 0;
    const num2 = parseFloat(num2Input.value) || 0;
    
    if (num2 > num1) {
      result2.value = (num1 - num2);
      result3.value = "دائن";
    }else if (num1 > num2){
      result2.value = (num1 - num2);
      result3.value = "مدين";
    }else if(num1 == num2){
      result2.value = 0;
      result3.value = "-";
    }else{
      result2.value = "";
      result3.value = "";
    }
    });
    });

	</script>
<script>
    function subtract() {
        const invoiceInput = document.getElementById('trader-invoice');
        const paidInput = document.getElementById('trader-paid');
        const residualInput = document.getElementById('trader-residual');

        const invoiceValue = parseFloat(invoiceInput.value) || 0;
        const paidValue = parseFloat(paidInput.value) || 0;

        if (invoiceValue >= paidValue) {
            residualInput.value = invoiceValue - paidValue;
        } else {
            // Handle the case where invoiceValue is less than paidValue (optional)
            // You can display an error message or perform another action here.
            residualInput.value = ''; // Clear the "المتبقي" field.
        }
    }
</script>


  <script>
    function sum() {
    var trader_invoice = parseInt(document.getElementById('trader-invoice').value);
    var trader_paid= parseInt(document.getElementById('trader-paid').value);
  
    if (trader_invoice >= trader_paid){
      var final = (trader_invoice - trader_paid);
    }
      
    if (!isNaN(result)) {
        document.getElementById('trader-invoice').value = final;
    }else{
      document.getElementById('trader-invoice').value = trader_invoice;
    }
}

  </script>
<script>
function sum() {
    var num1Elements = document.querySelectorAll(".number1");
    var num2Elements = document.querySelectorAll(".number2");
    var totalProduct = 0;

    for (var i = 0; i < num1Elements.length; i++) {
        var num1 = parseFloat(num1Elements[i].value);
        var num2 = parseFloat(num2Elements[i].value);
        if (!isNaN(num1) && !isNaN(num2)) {
            totalProduct += num1 * num2;
        }
    }

    var cost = document.getElementById('cost').value.trim(); // Trim to remove leading/trailing whitespace

    if (cost === "") {
        // If cost is empty, set result to total product value
        document.getElementById('result').value = totalProduct;
    } else {
        cost = parseFloat(cost); // Convert to float if not empty
        if (!isNaN(totalProduct) && !isNaN(cost)) {
            var result = totalProduct - cost;
            document.getElementById('result').value = result;
        }
    }
}

</script>

<script>
// انتظر حتى تحميل الصفحة بالكامل
document.addEventListener("DOMContentLoaded", function() {
  // انتظر لمدة 5 ثوانٍ ثم قم بإخفاء العنصر
  setTimeout(function() {
    var successMessage = document.getElementById("success-message");
    if (successMessage) {
      successMessage.style.display = "none";
    }
  }, 5000); // 5000 ميلي ثانية = 5 ثوانٍ
});
</script>

</body>

</html>
