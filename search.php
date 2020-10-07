<?php include("includes/a_config.php");?>
<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
</head>
<body onload="loadDoc()">
    <fieldset class="text-center row">
        <legend>البحث</legend>
        <div class="search-form">
            
               <div class="form-row">
                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                     <select class="form-control form-control-lg" name="category" id="category">
                        <option>اختر الفئة</option>
                     </select>
                  </div>
                  
                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                     <select class="form-control form-control-lg" name="city" id="city">
                        <option>اخترالمدينة</option>
                     </select>
                  </div>
                  <!-- Select Country Location -->
                  <div class="col-xl-2 col-lg-4 col-md-4 col-sm-12 col-12">
                     
                     <button class="btn btn-default btn-block" type="button" value="recherche" onclick="search()"><span>بحث</span></button>
                  </div>
                  
                  <!-- Search Button -->
                  
               </div>
            
            
         </div>
        
    </fieldset>

    
    
    <div id="results" ></div>

    
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        
    var getParams = function (url) {
        var params = {};
        var parser = document.createElement('a');
        parser.href = url;
        var query = parser.search.substring(1);
        var vars = query.split('&');
        for (var i = 0; i < vars.length; i++) {
            var pair = vars[i].split('=');
            params[pair[0]] = decodeURIComponent(pair[1]);
        }
        return params;
    };

    function cities(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status >= 200 && this.status < 400) {//&& (this.status == 200 || this.status == 304)
                console.log(this.status);
                const city=document.getElementById("city");
                const results=JSON.parse(this.responseText);
                console.log('status:'+results.statusCode);
                results.data.forEach(function(element) {
                    option=document.createElement('option');
                    option.setAttribute('value',element.id);
                    text=document.createTextNode(element.city+' - '+element.region);
                    option.appendChild(text);
                    city.appendChild(option);
                });
            }
        };
        xhttp.open("GET", "https://api-staging.happy-season.com/api/v1/mobile/getcities", true);
        xhttp.send();
    }
    function categories(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status >= 200 && this.status < 400) {
                console.log(this.status);
                const category=document.getElementById("category");
                const results=JSON.parse(this.responseText);
                console.log('status:'+results.statusCode);
                results.data.forEach(function(element) {
                    option=document.createElement('option');
                    option.setAttribute('value',element.id);
                    text=document.createTextNode(element.type_name);
                    option.appendChild(text);
                    category.appendChild(option);
                });
            }
        };
        xhttp.open("GET", "https://api-staging.happy-season.com/api/v1/mobile/getcategories", true);
        xhttp.send();
    }
    function loadDoc() {
        cities();
        categories();
        params=getParams(window.location.href);
        console.log(params);
        setTimeout(1500);
        const category=document.getElementById("category");
        category.value=params.category;
        const city=document.getElementById("city");
        city.value=params.city;
        search(-1,params.category,params.city);

    }
    function search(n=-1,category=-1,city=-1){
        var xhttp = new XMLHttpRequest();
        const cityTAG=document.getElementById("city");
        const categoryTAG=document.getElementById("category");
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status >= 200 && this.status < 400) {
                if(n==-1){
                    const results=JSON.parse(this.responseText);
                    search(results.rowCount,category,city);
                }
                console.log(this.status);
                const resultSection=document.getElementById("results");
                const results=JSON.parse(this.responseText);
                resultSection.innerHTML='';
                if(results.rowCount==0){
                    resultSection.innerHTML='<div class="alert-warning">لا يوجد</div>';
                }
                console.log('status:'+results.statusCode);
                console.warn(results.data);
                let row;
                row=document.createElement('div');
                row.setAttribute('class','row');
                results.data.forEach(function(element,index) {
                    if(index%6==0){
                        row=document.createElement('div');
                        row.setAttribute('class','row');
                    }
                    
                    item=document.createElement('div');
                    item.setAttribute('class','card col-2',);                                                                                 
                    item.innerHTML='<img style="width: 100%;height: 15vw;object-fit: cover" src="'+element.image+'" class="card-img-top" alt="..."><div class="card-body"><h5 class="card-title">'+element.branch_name+'</h5><p class="card-text">'+element.rate+' / 5 </p>'+element.city_name+'</div>';
                    row.appendChild(item);
                    if(index%6==0){
                        resultSection.append(document.createElement('br'));
                        resultSection.appendChild(row);
                    }
                });
            }
        };
        var count=(n==-1)?1:n;
        var idCategory=(category==-1)?categoryTAG.value:category;
        var idCity=(city==-1)?cityTAG.value:city;
        const url="https://api-staging.happy-season.com/api/v1/mobile/getbranches/0/"+count+"/"+idCity+"/"+idCategory+"/1";
        xhttp.open("GET", url, true);
        xhttp.send();
    }

    </script>
    <script src="js/jquery.js"></script>

<?php include("includes/footer.php");?>

</body>
</html>