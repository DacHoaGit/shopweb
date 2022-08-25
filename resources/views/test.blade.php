<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<script>
        function getFullAddress(address, wardId, districtId, cityId){
            var address = address;
            var ward;
            var district;
            var city;
            fetch('https://provinces.open-api.vn/api/w/' + wardId)
                .then((response) => response.json())
                .then((data) => {
                    ward = data.name;
                    fetch('https://provinces.open-api.vn/api/d/' + districtId)
                        .then((response) => response.json())
                        .then((data) => {
                            district = data.name;
                            fetch('https://provinces.open-api.vn/api/p/' + cityId)
                                .then((response) => response.json())
                                .then((data) => {
                                    city = data.name;
                                    console.log(address + ward + district + city);
                                });  

                        });
                });
            
            
        }

        getFullAddress('abc',22,1,1);

</script>