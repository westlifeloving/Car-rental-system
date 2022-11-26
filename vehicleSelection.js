function carSelection(){
    var xhr = new XMLHttpRequest()
    xhr.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            showcontainer(this.responseText);
        }
    }    
    xhr.open("GET","vehicleDetails.json",true);
    xhr.send(null);
}

function showcontainer(json){
    if (json) {
        var vehicleDetails = JSON.parse(json);
        var list = vehicleDetails.vehicleDetails;
        var str = "";
        for (var i = 0; i < vehicleDetails.vehicleDetails.length; i++){
            var Model = list[i]['Model'];
            var avail = list[i]['Availability'];
            var Seats = list[i]['Seats'];
            var Price = list[i]['Price'];
            var ModelYear = list[i]['ModelYear'];
            var Brand = list[i]['Brand'];
            var vehicle = ModelYear + ' ' + Brand + ' ' + Model;
            var Mileage = list[i]['Mileage'];
            var fuel = list[i]['FuelType'];                
            var Description = list[i]['Description'];
            str += '<div>';
            str += '<img src="img/' + Model +'.jpg" height="240" width="320">';
            str += '<ul>';
            str += '<h3>' + vehicle + '</h3>';
            str += '<li style="list-style-type: none;">Avaliability: ' + avail + '</li>';
            str += '<li style="list-style-type: none;">Seats: ' + Seats + '</li>';
            str += '<li style="list-style-type: none;">Price Per Day: $' + Price + '</li>';
            str += '<li style="list-style-type: none;">Mileage: ' + Mileage + ' kms </li>';
            str += '<li style="list-style-type: none;">Fuel Type: ' + fuel + '</li>';
            str += '<li style="list-style-type: none;">Description: ' + Description + '</li>';
            str += '</ul>';
            str += '<button class="addbtn" onClick="postData(\''+Model+'\',\''+vehicle+'\',\''+Price+'\',\''+avail+'\')">Add to Cart</button>';
            str += '</div>';
            document.getElementById("container").innerHTML = str;
        }
    }
}

function postData(img,vehicle,Price,avail){
    var addbtn = "Model=" + img + "&car=" + vehicle + "&Price=" + Price + "&Availability=" + avail;
    var xh = new XMLHttpRequest();
    xh.onreadystatechange = function () {
        var mess = this.responseText;
        if(this.readyState == 4 && this.status == 200){
            if (mess == "1") {
                alert("This car is not avaliable now. Please try other cars.");
            }else{
                alert("Add to the Cart successfully.");
            }
        }
    }
    xh.open("POST","vehicleDetails.php",true);
    xh.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xh.send(addbtn);
}