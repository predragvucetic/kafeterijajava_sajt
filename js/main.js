$(document).ready(function(){

    // USERS
    // GET USER BY ID 
    $(document).on("click", ".update-user", function(e){
        e.preventDefault();
        
        let id = $(this).data("id");

        $.ajax({
            url: "models/admin/users/get_one.php",
            method: "GET",
            dataType: "json",
            data: {
                id: id
            },
            success: function(user){
                console.log(user);
                fillFormUsers(user);
            },
            error: function(errors){
                console.log(errors);
            }
        });
    });

    // UPDATE USER
    $(document).on("click", "#saveUser", function(e){
        e.preventDefault();

        let id = $("#hdnId").val();

        if(id !== ""){

            $.ajax({
                url: "models/admin/users/update.php",
                method: "POST",
                dataType: "json",
                data: {
                    id: id,
                    firstName: $("#first_name").val(),
                    lastName: $("#last_name").val(),
                    username: $("#username").val(),
                    email: $("#email").val(),
                    password: $("#password").val(),
                    active: $("#active").val(),
                    role: $("#ddlRole").val(),
                    send: true
                },
                success: function(data){
                    //console.log(data)
                    clearFormUsers();
                    printUsers();
                },
                error: function(errors){
                    console.log(errors);
                }
            });
        }
        else{

            // INSERT USER
            $.ajax({
                url: "models/admin/users/insert.php",
                method: "POST",
                dataType: "json",
                data: {
                    firstName: $("#first_name").val(),
                    lastName: $("#last_name").val(),
                    username: $("#username").val(),
                    email: $("#email").val(),
                    password: $("#password").val(),
                    active: $("#active").val(),
                    role: $("#ddlRole").val(),
                    send: true
                },
                success: function(data){
                    console.log(data);
                    clearFormUsers();
                    printUsers();
                },
                error: function(errors){
                    console.log(errors);
                }
            });
        }
    });

    // DELETE USER
    $(document).on("click", ".delete-user", function(e){
        e.preventDefault();

        let id = $(this).data("id");

        $.ajax({
            url: "models/admin/users/delete.php",
            method: "GET",
            dataType: "json",
            data: {
                id: id
            },
            success: function(){
                console.log("User successfully deleted!");
                printUsers();
            },
            error: function(errors){
                console.log(errors);
            }
        });
    });


    // PRODUCTS
    // GET PRODUCT BY ID
    $(document).on("click", ".update-product", function(e){
        e.preventDefault();

        let id = $(this).data("id");

        $.ajax({
            url: "models/admin/posts/get_one.php",
            method: "GET",
            dataType: "json",
            data: {
                id: id
            },
            success: function(product){
                console.log(product);
                fillFormProduct(product);
            },
            error: function(errors){
                console.log(errors);
            }
        })
    })

    // UPDATE PRODUCT
    $(document).on("click", "#saveProduct", function(){

        let id = $("#hdnId").val();

        if(id !== ""){

            $.ajax({
                url: "models/admin/posts/update.php",
                method: "POST",
                dataType: "json",
                data: {
                    id: id,
                    title: $("#title").val(),
                    description: $("#description").val(),
                    date: $("#date").val(),
                    photo: $("#ddlPhoto").val(),
                    user: $("#ddlUser").val(),
                    send: true
                },
                success: function(data){
                    console.log(data);
                    clearFormProduct();
                    adminPrintProducts();
                },
                error: function(errors){
                    console.log(errors);
                }
            })
        }
        else{

            // INSERT PRODUCT
            $.ajax({
                url: "models/admin/posts/insert.php",
                method: "POST",
                dataType: "json",
                data: {
                    name: $("#title").val(),
                    description: $("#description").val(),
                    price: $("#date").val(),
                    photo: $("#ddlPhoto").val(),
                    user: $("#ddlUser").val(),
                    send: true
                },
                success: function(data){
                    console.log(data);
                    clearFormProduct();
                    adminPrintProducts();
                },
                error: function(errors){
                    console.log(errors);
                }
            })
        }
    })

    // DELETE POST
    $(document).on("click", ".delete-product", function(e){
        e.preventDefault();

        let id = $(this).data("id");

        $.ajax({
            url: "models/admin/posts/delete.php",
            method: "GET",
            dataType: "json",
            data: {
                id: id
            },
            success: function(){
                console.log("Post successfully deleted!");
                adminPrintProducts();
            },
            error: function(errors){
                console.log(errors);
            }
        });
    });


    // GALLERY
    // PAGINATION GALLERY
    $(document).on("click", ".gallery-pagination", function(e){
        e.preventDefault();
        
        let limit = $(this).data("limit");

        $.ajax({
            url: "models/gallery/pagination.php",
            method: "GET",
            dataType: "json",
            data: {
                limit: limit
            },
            success: function(data){
                console.log(data);
                printImages(data.images);
                printGalleryPagination(data.numOfImages);
            },
            error: function(error){
                console.log(error);
            }
        });
    });

    // DELETE PHOTO
    $(document).on("click", ".fa-trash", function(){
        
        let id = $(this).data("id");

        $.ajax({
            url: "models/admin/gallery/delete.php",
            method: "GET",
            dataType: "json",
            data: {
                id: id
            },
            success: function(){
                console.log("Photo successfully deleted!");
                printAdminGallery();
            },
            error: function(errors){
                console.log(errors);
            }
        })
    })


})


// USERS FUNCTIONS
function printUsers(){
    $.ajax({
        url: "models/admin/users/get_all.php",
        method: "GET",
        dataType: "json",
        success: function(users){
            let html = "";

            for(let user of users){
                html += `
                <tr>
                    <td>${ user.idKorisnik }</td>
                    <td>${ user.ime }</td>
                    <td>${ user.prezime }</td>
                    <td>${ user.korisnickoIme }</td>
                    <td>${ user.email }</td>
                    <td>${ user.lozinka }</td>
                    <td>${ user.aktivan }</td>
                    <td>${ user.idUloga }</td>
                    <td><a href="#" class="update-user" data-id="${ user.idKorisnik }">Edit</a></td>
                    <td><a href="#" class="delete-user" data-id="${ user.idKorisnik }">Delete</a></td>
                </tr>
                `;
            }

            $('#users').html(html);
        }
    })
}

function fillFormUsers(user){
    $("#hdnId").val(user.idKorisnik);
    $("#first_name").val(user.ime);
    $("#last_name").val(user.prezime);
    $("#username").val(user.korisnickoIme);
    $("#email").val(user.email);
    //$("#password").val(user.lozinka);
    //$("#first_name").val(user.first_name);
    //$("#first_name").val(user.first_name);
    if(user.active == 1){
        $("input[name='active']").prop('checked',true);
        $("input[name='active']").val(user.aktivan);
    }
    //$("#ddlRole").val(user.first_name);
}

function clearFormUsers(){
    $("#hdnId").val("");
    $("#first_name").val("");
    $("#last_name").val("");
    $("#username").val("");
    $("#email").val("");
    $("#password").val("");
    $("#active").val("");
    $("#ddlRole").val("");
}


// PRODUCTS FUNCTIONS
function adminPrintProducts(){
    $.ajax({
        url: "models/admin/posts/get_all.php",
        method: "GET",
        dataType: "json",
        success: function(products){
            let html = "";
            for(let product of products){
                html += `
                <tr>
                    <td>${ product.idPost }</td>
                    <td>${ product.naslov }</td>
                    <td>${ product.sadrzaj }</td>
                    <td>${ product.datumObjave }</td>
                    <td>${ product.idSlika }</td>
                    <td>${ product.idKorisnik }</td>
                    <td><a href="#" class="update-product" data-id="${ product.idPost }">Edit</a></td>
                    <td><a href="#" class="delete-product" data-id="${ product.idPost }">Delete</a></td>
                </tr>    
                `;
            }

            $("#products").html(html);
        }
    })
}

function fillFormProduct(product){
    $("hdnId").val(product.idPost);
    $("#title").val(product.naslov);
    $("#description").val(product.sadrzaj);
}

function clearFormProduct(){
    $("hdnId").val('');
    $("#title").val('');
    $("#description").val('');
    $("#date").val('');
    $("#ddlPhoto").val('');
    $("#ddlUser").val('');
}


// GALLERY FUNCTIONS
function printAdminGallery(){
    $.ajax({
        url: "models/admin/gallery/get_all.php",
        method: "GET",
        dataType: "json",
        success: function(photos){
            let html = "";
            for(let photo of photos){
                html += `
                <th><img src="${ photo.putanjaMala }"></img>
                    <button class="btn"><i class="fa fa-trash" data-id="${ photo.idGalerija }"></i></button>
                    <button class="btn"><i class="fa fa-edit" data-id="${ photo.idGalerija }"></i></button>
                </th>
                `;
            }

            $("#gallery").html(html);
        }
    })
}

function printImages(images){
    let html = "";
    for(let image of images){
        html += `
        <div class="galerija">
            <a href="${ image.putanja }" data-lightbox="mojagalerija" alt="${ image.alt }">
            <img src="${ image.putanja }" width="400px" height="300px"/></a>
        </div>
        `;
    }

    $("#gallery").html(html);
}

function printGalleryPagination(numOfImages){
    let html = "";
    for(let i = 0; i < numOfImages; i++){
        html += `
        <a href="#" class="gallery-pagination" data-limit="${ i }">${ i+1 }</a>
        `;
    }

    $(".pagination").html(html);
}

