@extends('admin.main')

@section('main')
    <style>
        .container_form {
            display: flex;
            min-height: 100vh;
            justify-content: center;
            align-items: center;
            margin-left: 20%;
        }

        .container_form .container {
            max-width: 700px;
            width: 100%;
            background: #fff;
            padding: 25px 30px;
            border-radius: 15px;
            border: 1px solid #f3f2f2;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }

        .container_form .container .title {
            font-size: 25px;
            font-weight: 500;
            position: relative;
        }

        .container_form .container .title::before {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 100px;
            background: linear-gradient(135deg, #0b2243, #05636d);
        }

        .container_form .container form .user-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 20px 0 12px 0;
        }

        .container_form form .user-details .input-box {
            margin-bottom: 15px;
            width: calc(100% / 2 - 20px);
        }

        .container_form .user-details .input-box .details {
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .container_form .user-details .input-box input,
        .container_form .user-details .input-box select,
        .container_form .user-details .input-box textarea {
            min-height: 45px;
            width: 100%;
            outline: none;
            border-radius: 5px;
            border: 1px solid #ccc;
            padding-left: 15px;
            font-size: 16px;
            border-bottom-width: 2px;
            transition: all 0.3s ease;
        }

        .container_form .user-details .input-box input:focus,
        .container_form .user-details .input-box select:focus,
        .container_form .user-details .input-box textarea:focus {
            border-color: #05636d;
        }

        .container_form form .button {
            margin-left: auto;
            margin-right: 0;
            height: 45px;
        }

        .container_form form .button button {
            height: 100%;
            width: 100%;
            outline: none;
            color: #0b2243;
            background: transparent;
            font-size: 18px;
            font-weight: 500;
            border-radius: 5px;
            letter-spacing: 1px;
            border: 1px solid #f3f2f2;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.05);
        }

        .container_form form .button button:hover {
            color: white;
            background: linear-gradient(135deg, #0b2243, #05636d);
        }

        /* file upload */

        .container_upload {
            display: flex;
            height: 200px;
            background: #fff;
            border-radius: 5px;
            padding: 30px;
            box-shadow: 7px 7px 12px rgba(0, 0, 0, 0.05);

            cursor: pointer;
            margin: 30px 0;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            border-radius: 5px;
            border: 2px dashed #05636d;
        }

        .container_upload :where(i, p) {
            color: #05636d;
        }

        .container_upload i {
            font-size: 50px;
        }

        .container_upload p {
            margin-top: 15px;
            font-size: 16px;
        }

        .container_upload section .row {
            margin-bottom: 10px;
            background: #E9F0FF;
            list-style: none;
            padding: 15px 20px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .container_upload section .row i {
            color: #05636d;
            font-size: 30px;
        }

        .container_upload section .details span {
            font-size: 14px;
        }

        .container_upload .progress-area .row .content {
            width: 100%;
            margin-left: 15px;
        }

        .container_upload .progress-area .details {
            display: flex;
            align-items: center;
            margin-bottom: 7px;
            justify-content: space-between;
        }

        .container_upload .progress-area .content .progress-bar {
            height: 6px;
            width: 100%;
            margin-bottom: 4px;
            background: #fff;
            border-radius: 30px;
        }

        .container_upload .content .progress-bar .progress {
            height: 100%;
            width: 0%;
            background: #05636d;
            border-radius: inherit;
        }

        .container_upload .uploaded-area {
            max-height: 232px;
            overflow-y: scroll;
        }

        .container_upload .uploaded-area.onprogress {
            max-height: 150px;
        }

        .container_upload .uploaded-area::-webkit-scrollbar {
            width: 0px;
        }

        .container_upload .uploaded-area .row .content {
            display: flex;
            align-items: center;
        }

        .container_upload .uploaded-area .row .details {
            display: flex;
            margin-left: 15px;
            flex-direction: column;
        }

        .container_upload .uploaded-area .row .details .size {
            color: #404040;
            font-size: 11px;
        }

        .container_upload .uploaded-area i.fa-check {
            font-size: 16px;
        }

    </style>

    <div class="container_form">
        <div class="container">
            <div class="title">Edit Buku</div>
            <form action="#">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">ID</span>
                        <input type="text" readonly>
                    </div>
                    <div class="input-box">
                        <span class="details">Name</span>
                        <input type="text" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Qty</span>
                        <input type="number">
                    </div>
                    <div class="input-box">
                        <span class="details">Price</span>
                        <input type="number">
                    </div>
                    <div class="input-box">
                        <span class="details">Synopsis</span>
                        <textarea name="" id="" cols="40" rows="5"></textarea>
                    </div>
                    @php
                        $genres = DB::table('genres')->get();
                    @endphp
                    <div class="input-box">
                        <span class="details">Genre</span>
                        <select name="genre" id="genre">
                            @foreach ($genres as $g)
                                <option value="{{$g->genre_id}}">{{$g->genre_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @php
                        $publishers = DB::table('publishers')->get();
                    @endphp
                    <div class="input-box">
                        <span class="details">Publisher</span>
                        <select name="publishers" id="publishers">
                            @foreach ($publishers as $p)
                                <option value="{{$p->publisher_id}}">{{$p->publisher_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @php
                        $authors = DB::table('authors')->get();
                    @endphp
                    <div class="input-box">
                        <span class="details">Author</span>
                        <select name="author" id="author">
                            @foreach ($authors as $a)
                                <option value="{{$a->author_id}}">{{$a->author_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="container_upload">
                        <input class="file-input" type="file" name="file" style="display: none">
                        <i class="fa fa-upload"></i>
                        <p>Browse File to Upload</p>
                        <section class="progress-area"></section>
                        <section class="uploaded-area"></section>
                    </div>
                    <div class="button">
                        <button type="submit" class="btn">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        const form = document.querySelector(".container_upload"),
            fileInput = document.querySelector(".file-input"),
            progressArea = document.querySelector(".progress-area"),
            uploadedArea = document.querySelector(".uploaded-area");

        // form click event
        form.addEventListener("click", () => {
            fileInput.click();
        });

        fileInput.onchange = ({
            target
        }) => {
            let file = target.files[
                0]; //getting file [0] this means if user has selected multiple files then get first one only
            if (file) {
                let fileName = file.name; //getting file name
                if (fileName.length >= 12) { //if file name length is greater than 12 then split it and add ...
                    let splitName = fileName.split('.');
                    fileName = splitName[0].substring(0, 13) + "... ." + splitName[1];
                }
                uploadFile(fileName); //calling uploadFile with passing file name as an argument
            }
        }

        // file upload function
        function uploadFile(name) {
            let xhr = new XMLHttpRequest(); //creating new xhr object (AJAX)
            xhr.open("POST", "php/upload.php"); //sending post request to the specified URL
            xhr.upload.addEventListener("progress", ({
                loaded,
                total
            }) => { //file uploading progress event
                let fileLoaded = Math.floor((loaded / total) * 100); //getting percentage of loaded file size
                let fileTotal = Math.floor(total / 1000); //gettting total file size in KB from bytes
                let fileSize;
                // if file size is less than 1024 then add only KB else convert this KB into MB
                (fileTotal < 1024) ? fileSize = fileTotal + " KB": fileSize = (loaded / (1024 * 1024)).toFixed(2) +
                    " MB";
                let progressHTML = `<li class="row">
                          <i class="fas fa-file-alt"></i>
                          <div class="content">
                            <div class="details">
                              <span class="name">${name} • Uploading</span>
                              <span class="percent">${fileLoaded}%</span>
                            </div>
                            <div class="progress-bar">
                              <div class="progress" style="width: ${fileLoaded}%"></div>
                            </div>
                          </div>
                        </li>`;
                // uploadedArea.innerHTML = ""; //uncomment this line if you don't want to show upload history
                uploadedArea.classList.add("onprogress");
                progressArea.innerHTML = progressHTML;
                if (loaded == total) {
                    progressArea.innerHTML = "";
                    let uploadedHTML = `<li class="row">
                            <div class="content upload">
                              <i class="fas fa-file-alt"></i>
                              <div class="details">
                                <span class="name">${name} • Uploaded</span>
                                <span class="size">${fileSize}</span>
                              </div>
                            </div>
                            <i class="fas fa-check"></i>
                          </li>`;
                    uploadedArea.classList.remove("onprogress");
                    // uploadedArea.innerHTML = uploadedHTML; //uncomment this line if you don't want to show upload history
                    uploadedArea.insertAdjacentHTML("afterbegin",
                        uploadedHTML); //remove this line if you don't want to show upload history
                }
            });
            let data = new FormData(form); //FormData is an object to easily send form data
            xhr.send(data); //sending form data
        }
    </script>
@endsection
