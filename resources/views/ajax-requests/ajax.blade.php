<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax requests</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    
    <script>
       

const apiUrl = 'http://127.0.0.1:8000/api/index'; // url to get the data 

fetch(apiUrl)
  .then(response => {
    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }
    return response.json();
  }).then(students => {
    // handle the data
    console.log(students);
  })
  .catch(error => console.error('Fetch error:', error));



    </script>

</body>
</html>