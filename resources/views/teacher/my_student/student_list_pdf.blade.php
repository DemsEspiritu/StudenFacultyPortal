<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Student List</title>
    <style>

body{
    font-family: "Times New Roman", Times, serif;
    font-size: 16px;
}
.text-center{
    font-size: 12px;
}
#myTable {
    font-family: Arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#myTable th, #myTable td {
    border: 1px solid #ddd;

    /* border: 0px; */
    padding: 8px;
    text-align: left;
}

#myTable th {
    background-color: #f2f2f2;
}

#search {
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #000000;
  
}

.text-sn{
    width:10px;
    font-size: 12px;
    font-style:solid;
}
h2{
    text-align: center;
    font-size: 12px;
    font-style:solid;
}
.header{
    margin-bottom: 5%;
    padding: 0;
  
}
h4{
    font-size: 12px;
    padding: 0;
}
span{
    padding-left: 90%;
}
.small-image {
    max-width: 80px; /* Adjust the value to your desired maximum width */
    height: auto;

  }
  .logo{
    margin-top: -40%;
    margin-left: 23%;
  }
  .section{
    margin-top:5%;
  }

</style>
</head>
<body>
            <div class="container-fluid">
                
            <div class="header">
                <h2>MASOLI HIGH SCHOOL</h2>
                <h2>MASOLI, BATO, CAMARINES SUR</h2>
                <h2>S/y {{ $students->first()->school_year_name }}</h2>
            </div>

            <div class="logo">
            <span><img src="{{ public_path('assets/img/school-logo.png') }}" alt="Your Image" class="small-image"></span>
                </div>

            <div class="section">
                <h4>Class: {{ $students->first()->class_name }} <span>Section: {{ $students->first()->section }}</span></h4>
            
            </div>

            <table id="myTable">
    <thead>
        <tr>
            <th class="text-sn">S/N</th>
            <th class="text-center">Name</th>
            <th class="text-center">Gender</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
            <tr>
                <td class="text-sn">{{ $loop->iteration }}.</td>
                <td class="text-center">{{ $student->last_name }} {{ $student->name }} {{ $student->middle_name }}.</td>
                <td class="text-center">{{ $student->gender === 'M' ? 'Male' : 'Female' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

            </div>
            </div>
</body>
</html>