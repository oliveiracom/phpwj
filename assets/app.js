//change to metch yout enviroment
const enviroment = "http://localhost/webjump/job/assessment-backend-wj/api/";


// ============ > Products
function showProducts() {
    $.getJSON( enviroment + "?do=listAll",function (data) {

            content = ``;

            $.each(data, function (key, val) {
                qtd = val.qtd;

                qtd <= 0 ?
                   stock = "<span class='special-price'>Out of stock</span>"
                : stock = qtd + " Available";

                content +=
                    `<li>
                        <div class='product-image'><img src='assets/images/product/` + randomPictures() + `.png' layout='responsive' width='164' height='145' alt='`+ val.name +`' /></div>
                        <div class='product-info'><div class='product-name'><span>` + val.name + `</span></div> <div class='product-price'>` + stock + `<span>
                        R$` + val.price + `</span></div></div>
                    </li>`;
            });

            $('.product-list').append(content);
            $('.allQtd').html(data.length);
    });
}

function addProduct(data) {
    $.ajax({
        url: enviroment + "?do=addCategory",
        type : "POST",
        contentType : 'application/json',
        data : data,
        success : function(result) {
            
        },
        error: function(xhr, resp, text) {
            console.log(xhr, resp, text);
        }
    });
    
    return false;
}

function editProduct(data) {
    $.ajax({
        url: enviroment + "?do=addCategory",
        type : "POST",
        contentType : 'application/json',
        data : data,
        success : function(result) {
            
        },
        error: function(xhr, resp, text) {
            console.log(xhr, resp, text);
        }
    });
    
    return false;
}

function deleteProduct(data) {
    $.ajax({
        url: enviroment + "?do=deleteProduct",
        type : "POST",
        contentType : 'application/json',
        data : data,
        success : function(result) {
        },
        error: function(xhr, resp, text) {
            console.log(xhr, resp, text);
        }
    });
    
    return false;
}

// ============ > Categories
function showCategories() {
    $.getJSON( enviroment + "?do=listCategories", function (data) {
        content = ``;

        $.each(data, function (key, val) {
            content = `
                <tr class="data-row">
                <td class="data-grid-td">
                <span class="data-grid-cell-content">`+ val.name +`</span>
                </td>
            
                <td class="data-grid-td">
                <span class="data-grid-cell-content">`+ val.code +`</span>
                </td>
            
                <td class="data-grid-td">
                <div class="actions">
                    <a href="editCategory?id=`+ val.id +`"><button class="btn-info">Edit</button></a>
                    <button class="btn-danger" title="`+ val.id +`">Delete</button>
                </div>
                </td>
            </tr>
            `; 

            $('.data-grid').append(content);
        });
    });
}

function selectCategories() {
    
    $.getJSON( enviroment + "?do=listCategories", function (data) {
        $.each(data, function (key, val) {
            const content = `<option value="`+ val.id +`">`+ val.name +`</option>`; 

            $('#category').append(content);
        });
    });

}

function showCategory(id) {    
    $.getJSON( enviroment + "?do=showCategory&id=" + id, function (data) {
        $.each(data, function (key, val) {
            $('#category-name').val(val.name);
            $('#category-code').val(val.code);
        });
    });
}

function addCategory(data) {
    $.ajax({
        url: enviroment + "?do=addCategory",
        type : "POST",
        contentType : 'application/json',
        data : data,
        success : function(result) {
        },
        error: function(xhr, resp, text) {
            console.log(xhr, resp, text);
        }
    });
    
    return false;
}

function editCategory(data, id) {
    $.ajax({
        url: enviroment + "?do=editCategory&id=" + id,
        type : "POST",
        contentType : 'application/json',
        data : data,
        success : function(result) {
            // tudo ok
            console.log( 'rodou ajax ');
        },
        error: function(xhr, resp, text) {
            console.log(xhr, resp, text);
        }
    });
    
    return false;

}

function randomPictures() {
    const picsArray = [1,2,3,4];
    const randomPic = picsArray[Math.floor(Math.random() * picsArray.length)];
    return randomPic;
}