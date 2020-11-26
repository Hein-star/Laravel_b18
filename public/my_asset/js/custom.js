$(document).ready(function(){
    // alert('Ok');
    showData();
    count();

    //add to cart btn
    $('.addtocartBtn').click(function()
    {

        let id = $(this).data("id");
        let name = $(this).data("name");
        let codeno = $(this).data("codeno");
        let price = $(this).data("price");
        let discount= $(this).data("discount");
        let photo = $(this).data("photo");
        let qty = 1;

        let items = {id:id, name:name,codeno:codeno, photo:photo, qty:qty, price:price,discount:discount,}
        let itemList = localStorage.getItem("item");

        let itemListId = [];
        let itemListArray;

        if(itemList === null)
        {
            itemListArray = [];
        }
        else
        {
            itemListArray = JSON.parse(itemList);
        }

        let status = false;
        $.each(itemListArray,function (i,v){
            if(v.id === id)
            {
                v.qty++;
                status = true;
            }
        });

        if(status === false)
        {
            itemListArray.push(items);
        }
        let itemListString = JSON.stringify(itemListArray);
        // console.log(itemListArray);
        localStorage.setItem("item",itemListString);
        showData();

    });

    //count data func
    function count() 
    {
        let totalCount = 0;
        let itemList = localStorage.getItem("item");
        if(itemList)
        {
            let itemListArray = JSON.parse(itemList);
            $.each(itemListArray,function(i,v) {
                totalCount += v.qty;
            });
        }
        $(".cartNoti").html(totalCount);
    }

     //show data func
    function showData() {
        let items = localStorage.getItem("item");
        if(items)
        {
            let itemListArray = JSON.parse(items);
            let html = "";
            let num = 1;
            let total = 0;
            // console.log(itemListArray);
            $.each(itemListArray, function (i, v) {

                var originalPrice;
                var discountPrice;
                if(v.discount != 0 || v.discount != "")
                {
                    var subTotal = v.qty * v.discount;
                    discountPrice = v.discount;
                    originalPrice = v.price;
                }
                else {
                    var subTotal = v.qty * v.price;
                    discountPrice = "0";
                    originalPrice = v.price;
                }

                // console.log(v.qty);
                total += subTotal;
                html += `<tr>
                    <td>
                        <a data-id="${i}" class="remove" style="color:red; cursor:pointer;">
                            <i class="fas fa-times"></i>
                        </a>
                    </td>
                    <td>
                        <img src="${v.photo}" class="cartImg" width="150" height="150" style="object-fit:cover;">
                    </td>
                    <td>
                        <div class="mt-5">
                            <p class="text-dark">Item Name : <span class="text-muted"> ${v.name}</span></p>
                            <p class="text-dark">Item Code : <span class="text-muted"> ${v.codeno}</span></p>
                        </div>
                    </td>
                    <td>
                    </a>
                        <div class="mt-5">
                            <a data-id="${i}" class="plus_btn" style="color:#3498DB; cursor:pointer;">
                            <i class="fas fa-plus"></i></a>
                        </div>
                    </td>
                    <td>
                        <div class="mt-5">
                            <p class="text-dark">${v.qty}</p>
                        </div>
                    </td>
                    <td>
                        <div class="mt-5">
                            <a data-id="${i}" class="minus_btn" style="color:#3498DB; cursor:pointer;">
                                <i class="fas fa-minus"></i></i>
                            </a>
                        </div>
                        
                    </td>
                    <td>
                        <div class="mt-5">
                            <p class="text-dark">
                            <small>Discount :</small>
                            <span class="text-muted font-weight-bold">${discountPrice} mmk</span>
                        </p>
                        <p class="font-weight-lighter text-dark">
                            <small>Price :</small>
                            <span class="text-muted font-weight-bold">${originalPrice} mmk</span>
                        </p>
                        </div>
                    </td>
                    <td class="text-dark">
                       <div class="mt-5">
                            <span class="text-dark font-weight-bold"> ${subTotal} mmk</span>
                       </div>
                    </td>
                </tr>`;
            });

            //total footer table
            html+= `
                    <tr>
                        <td colspan="8">
                            <h3 class="text-right text-success"> Total : ${total} Ks </h3>
                        </td>
                    </tr>
                   `;
            //defining table
            $("tbody").html(html);
            $(".cartPrice").html(total);
            count();
        }
    }
   
    //increase btn
    $("tbody").on("click",'.plus_btn',function (){
        // alert('Ok');
        let id = $(this).data("id");
        let itemList = localStorage.getItem("item");
        let itemListArray = JSON.parse(itemList);
        itemListArray[id].qty++;

        let itemListString = JSON.stringify(itemListArray);
        localStorage.setItem("item",itemListString);
        showData();
        count();
    });

    //decrease btn
    $("tbody").on("click",'.minus_btn',function (){
        let id = $(this).data("id");
        let itemList = localStorage.getItem("item");
        let itemListArray = JSON.parse(itemList);
        if(itemListArray[id].qty <= 1)
        {
            itemListArray.splice(id,1);
            let itemListString = JSON.stringify(itemListArray);
            localStorage.setItem("item",itemListString);
            showData();
            count();
        }
        else
        {
            itemListArray[id].qty--;
        }
        let itemListString = JSON.stringify(itemListArray);
        localStorage.setItem("item",itemListString);
        showData();
        count();
    });

     //remove btn
     $("tbody").on('click','.remove',function (){
        let id = $(this).data("id");
        let itemList = localStorage.getItem("item");
        let itemListArray = JSON.parse(itemList);

        let chk = confirm("Are you sure you want to remove this item ?");
        if(chk === true)
        {
            itemListArray.splice(id,1);
            let itemListString = JSON.stringify(itemListArray);
            localStorage.setItem("item",itemListString);
            showData();
            count();
        }
    });

    
    $('.checkoutBtn').click(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let notes = $('.notes').val();
    let order = localStorage.getItem("item");

    $.post("/order",{order:order,notes:notes},function(response){
        console.log(response);
    });
    });
});
