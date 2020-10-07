<?php include("includes/a_config.php");?>
<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
<meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include("includes/head-tag-contents.php");?>
</head>
<body onload="loadDoc()" itemtype='https://schema.org/WebPage' itemscope='itemscope' class="weddingcity-nice-select">
     
	 <div>
		<header>
		   <div class="header header-primary header-fullwidth-transparent fixed-top ">
			  <div class="container-fluid">
				 <div class="row justify-content-end align-items-center">
					<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
					   <div class="header-logo">
						  <h2 class="weddingcity-site-title"><a href="https://wordpress.happy-season.com/" rel="home">هابي سيزون</a></h2>
					   </div>
					</div>
					<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
					   <div class="d-lg-flex justify-content-end align-items-center">
						  <nav id="navigation" itemtype="https://schema.org/SiteNavigationElement" itemscope="itemscope">
						  </nav>
					   </div>
					</div>
				 </div>
			  </div>
		   </div>
		   
		</header>
		
		<main id="content" class="site-content">
		   <div data-elementor-type="wp-post" data-elementor-id="887" class="elementor elementor-887" data-elementor-settings="[]">
			  <div class="elementor-inner">
				 <div class="elementor-section-wrap">
					<section class="elementor-section elementor-top-section elementor-element elementor-element-61d1b28 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="61d1b28" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;shape_divider_bottom&quot;:&quot;mountains&quot;}">
					   <div class="elementor-background-overlay"></div>
					   <div class="elementor-shape elementor-shape-bottom" data-negative="false">
						  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
							 <path class="elementor-shape-fill" opacity="0.33" d="M473,67.3c-203.9,88.3-263.1-34-320.3,0C66,119.1,0,59.7,0,59.7V0h1000v59.7 c0,0-62.1,26.1-94.9,29.3c-32.8,3.3-62.8-12.3-75.8-22.1C806,49.6,745.3,8.7,694.9,4.7S492.4,59,473,67.3z"/>
							 <path class="elementor-shape-fill" opacity="0.66" d="M734,67.3c-45.5,0-77.2-23.2-129.1-39.1c-28.6-8.7-150.3-10.1-254,39.1 s-91.7-34.4-149.2,0C115.7,118.3,0,39.8,0,39.8V0h1000v36.5c0,0-28.2-18.5-92.1-18.5C810.2,18.1,775.7,67.3,734,67.3z"/>
							 <path class="elementor-shape-fill" d="M766.1,28.9c-200-57.5-266,65.5-395.1,19.5C242,1.8,242,5.4,184.8,20.6C128,35.8,132.3,44.9,89.9,52.5C28.6,63.7,0,0,0,0 h1000c0,0-9.9,40.9-83.6,48.1S829.6,47,766.1,28.9z"/>
						  </svg>
					   </div>

					   <div>
						  <div>
							 <div>
								<div>
								   <div>
									  <div>
										 <div class="elementor-widget-container">
											<div class="container">
											   <div class="row">
												  <div class="offset-xl-1 col-xl-10 offset-lg-1 col-lg-10 col-md-12 col-sm-12 col-12 mb60">
													 <div class="text-center">
														<div class="search-head">
														   <h1 class="search-head-title text-white">مطاعم و قاعات الحفلات  <br>
															  محلات الازياء و الكثير 
														   </h1>
														   <p class="d-none d-xl-block d-lg-block d-sm-block text-white">اختر من بين أكثر من 500 مكان زفاف وخدمات وموفرين محليين</p>
														   <!-- slider title / description -->
														</div>
														<div class="search-form">
														   <form action="search.php">
															  <div class="form-row">
																 <div class="col-xl-5 col-lg-5 col-md-4 col-sm-12 col-12">
																	<select class="form-control form-control-lg" required name="category" id="category">
																	   <option disabled selected>اختر الفئة</option>
																	</select>
																 </div>
																 
																 <div class="col-xl-5 col-lg-5 col-md-4 col-sm-12 col-12">
																	<select class="form-control form-control-lg" required name="city" id="city">
																	   <option disabled selected>اخترالمدينة</option>
																	</select>
																 </div>
																 <!-- Select Country Location -->
																 <div class="col-xl-2 col-lg-4 col-md-4 col-sm-12 col-12">
																	
																	<button class="btn btn-default btn-block" type="submit" value="recherche" onclick="search()"><span>بحث</span></button>
																 </div>
																 
																 <!-- Search Button -->
																 
															  </div>
														   </form>
														   
														</div>
													 </div>
												  </div>
											   </div>
											</div>
										 </div>
									  </div>
								   </div>
								</div>
							 </div>
						  </div>
					   </div>
					</section>
					<div id="results"></div>
					
				 </div>
			  </div>
		   </div>
		</main>
	 </div>
	 <script>
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
		}
		function search(n=-1){
			var xhttp = new XMLHttpRequest();
			const city=document.getElementById("city");
			const category=document.getElementById("category");
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status >= 200 && this.status < 400) {
					if(n==-1){
						const results=JSON.parse(this.responseText);
						search(results.rowCount);
					}
					console.log(this.status);
					const resultSection=document.getElementById("results");
					const results=JSON.parse(this.responseText);
					resultSection.innerHTML='';
					if(results.rowCount==0){
						resultSection='<div class="alert-warning">لا يوجد</div>';
					}
					console.log('status:'+results.statusCode);
					console.warn(results.data);
					let row;
					row=document.createElement('div');
					row.setAttribute('class','row');
					results.data.forEach(function(element,index) {
						if(index%6==0 && index>0){
							row=document.createElement('div');
							row.setAttribute('class','row');
						}
						item=document.createElement('div');
						item.setAttribute('class','card col-md-2  text-right');
						item.innerHTML='<img src="'+element.image+'" class="card-img-top" alt="..."><div class="card-body"><h5 class="card-title">'+element.branch_name+'</h5><p class="card-text">'+element.rate+' / 5 </p>'+element.city_name+'</div>';
						row.appendChild(item);
						if(index%6==0 && index>0){
							resultSection.append(document.createElement('br'));
							resultSection.appendChild(row);
						}
					});
				}
			};
			var count=(n==-1)?1:n;
			const url="https://api-staging.happy-season.com/api/v1/mobile/getbranches/0/"+count+"/"+city.value+"/"+category.value+"/1";
			xhttp.open("GET", url, true);
			xhttp.send();
		}
	
		</script>
	 <script src="js/jquery.js"></script>
	 
	 
<?php include("includes/footer.php");?>

</body>
</html>