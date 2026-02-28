function required(){
    const name = document.getElementById('email');
    const password = document.getElementById('password');
    var message1="";
    if (name.value === '' || name.value === null) {
        document.getElementById("error1").innerHTML="*Name filed is required";
        message1="Name filed is required"
    }
    if (password.value ==='' || password.value === null) {
        document.getElementById("error2").innerHTML="*Password filed is required";
        message1="Password filed is required"
    }
    if (message1==""){
        return true;
    }
    else{
        return false;
    }

}


function validation(){
    const Product = document.getElementById('Product');
	 const title = document.getElementById('title');
	  const keywords = document.getElementById('keywords');
	   const description = document.getElementById('description');
    const brand = document.getElementById('brand');
    const category = document.getElementById('category');
    const image = document.getElementById('image');
    const image_1 = document.getElementById('image_1');
    const image_2 = document.getElementById('image_2');
    const image_3 = document.getElementById('image_3');
    const product_type = document.getElementById('product_type');
    var message1="";
    if (Product.value === '' || Product.value === null) {
        document.getElementById("error1").innerHTML="*Product name filed is required";
        message1="true";
    }
	if (title.value === '' || title.value === null) {
        document.getElementById("titleerror1").innerHTML="*Title filed is required";
        message1="true";
    }
	if (keywords.value === '' || keywords.value === null) {
        document.getElementById("keywordserror1").innerHTML="*Keywords filed is required";
        message1="true";
    }
	if (description.value === '' || description.value === null) {
        document.getElementById("descriptionerror1").innerHTML="*Description name filed is required";
        message1="true";
    }
    if (brand.value ==='' || brand.value === null) {
        document.getElementById("error2").innerHTML="*Brand Name filed is required";
        message1="true";
    }
    if (category.value ==='' || category.value === null) {
        document.getElementById("error3").innerHTML="*Category Name filed is required";
        message1="true";
    }
    else{
        if(product_type.value=="1"){
            const thickness = document.getElementById('thickness');
            const color_name = document.getElementById('color_name');
            const size = document.getElementById('size');
            const series = document.getElementById('series');
    
            if (thickness.value ==='' || thickness.value === null) {
                document.getElementById("ajax_0").innerHTML="*Thickness filed is required";
                message1="true";
            }
            if (color_name.value ==='' || color_name.value === null) {
                document.getElementById("ajax_1").innerHTML="*Color Name filed is required";
                message1="true";
            }
            if (size.value ==='' || size.value === null) {
                document.getElementById("ajax_2").innerHTML="*Size filed is required";
                message1="true";
            }
            if (series.value ==='' || series.value === null) {
                document.getElementById("ajax_3").innerHTML="*Series filed is required";
                message1="true";
            }
    
        }
        else{
            const color_name = document.getElementById('color_name');
            const finish = document.getElementById('finish');
            const style = document.getElementById('style');
    
            if (finish.value ==='' || finish.value === null) {
                document.getElementById("ajax_1").innerHTML="*Product Finish filed is required";
                message1="true";
            }
            if (color_name.value ==='' || color_name.value === null) {
                document.getElementById("ajax_0").innerHTML="*Product Color Name filed is required";
                message1="true";
            }
            if (style.value ==='' || style.value === null) {
                document.getElementById("ajax_2").innerHTML="*Product Style filed is required";
                message1="true";
            }
        }
    }
    if (image.value ==='' || image.value === null) {
        document.getElementById("error4").innerHTML="*Product Image filed is required";
        message1="true";
    }

    if (image_1.value ==='' || image_1.value === null) {
        document.getElementById("error5").innerHTML="*There must be a product view image filed.";
        message1="true";
    }
    if (image_2.value ==='' || image_2.value === null) {
        document.getElementById("error6").innerHTML="*There must be a product view image filed.";
        message1="true";
    }
    if (image_3.value ==='' || image_3.value === null) {
        document.getElementById("error7").innerHTML="*There must be a product view image filed.";
        message1="true";
    }

    if (message1==""){
        return true;
    }
    else{
        return false;
    }
}


function validation_brand(){
    const brand = document.getElementById('brand');
    const logo = document.getElementById('logo');
    const brand_category = document.getElementById('brand_category');
    var message1="";

    if (brand.value === '' || brand.value === null) {
        document.getElementById("error1").innerHTML="*Brand Name filed is required";
        message1="true";
    }
    if (logo.value ==='' || logo.value === null) {
        document.getElementById("error2").innerHTML="*Brand Logo filed is required";
        message1="true";
    }
    if (brand_category.value ==='' || brand_category.value === null) {
        document.getElementById("error3").innerHTML="*Brand Category filed is required";
        message1="true";
    }
    if (message1==""){
        return true;
    }
    else{
        return false;
    }

}


function validation_Category(){
    const category = document.getElementById('category');
    var message1="";

    if (category.value === '' || category.value === null) {
        document.getElementById("error1").innerHTML="*Category Name filed is required";
        message1="true";
    }
    if (message1==""){
        return true;
    }
    else{
        return false;
    }

}

function validation_bulk(){
    const bulk = document.getElementById('bulk');
    var message1="";
    if (bulk.value ==='' || bulk.value === null) {
        document.getElementById("error1").innerHTML="*Bulk Upload filed is required";
        message1="true";
    }
    if (message1==""){
        return true;
    }
    else{
        return false;
    }
}



