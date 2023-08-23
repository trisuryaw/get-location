<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.11.0/css/flag-icons.min.css"
    />
    <title>Information User</title>
</head>
<body>
    <div class="container-fluid">
        <div class="d-flex flex-column justify-content-center align-items-center row-gap-3 vh-100">
            <form class="w-25" id="form">
                <div class="input-group">
                    <input type="text" class="form-control "name="ip" placeholder="Enter IP address">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
            <div class="card p-5 text-primary w-25">
                <h4 class="fw-semibold">Location User</h4>
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td>IP address</td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>Country Name</td>
                            <td>


                            </td>
                        </tr>
                        <tr>
                            <td>Country Code</td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>Region Name</td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>Region Code</td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>City Name</td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>Latitude</td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>Longitude</td>
                            <td> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <script>
        const form = document.getElementById('form')
        const td = document.querySelectorAll('.table tbody tr td:nth-child(2)')

        form.addEventListener('submit', search)

        function search(event){
            event.preventDefault()
            const formData = new FormData(form)
            fetch('http://127.0.0.1:8000/api/location', {
                method: 'POST',
                body: formData
            }).then(response => response.json())
                .then(data => {
                    // td.forEach((element, key) => {
                    //     console.info(element, key)
                    // })
                    Object.values(data.data).forEach((element, key) => {
                        td[key].innerHTML = `: ${element}`
                    })
                })
        }
    </script>
</body>
</html>
