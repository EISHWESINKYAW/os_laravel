$(document).ready(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  
  $(".no_item").hide();
  show_cart();
  update_cart_count();
  $('.add_to_cart').click(function () {
    var id=$(this).data('id');
    var name=$(this).data('name');
    var price=$(this).data('price');
    var discount=$(this).data('discount');
    //alert(discount);
    var photo=$(this).data('photo');
    var item={id:id,name:name,price:price,discount:discount,photo:photo,qty:1};
    //console.log(item);

    let oldcart=localStorage.getItem('newcart');
    if (oldcart==null) {
     var newcart=new Array(); 
   }else{
    var newcart=JSON.parse(oldcart);

  }
  var exist;

  $.each(newcart,function (i,v) {
    if (id==v.id)   {
      v.qty++;
      exist=true;
    }
  })
  if (!exist) {
    newcart.push(item);
  }

  localStorage.setItem('newcart',JSON.stringify(newcart));
  show_cart();
  update_cart_count();
})
  function show_cart() {
    update_cart_count();
    var mycart=localStorage.getItem('newcart');
    var result='';
    if (mycart!=null){
      newcart=JSON.parse(mycart);
      var total=0;
      var j=1;
      $.each(newcart,function (i,v) {
        var price=v.price;
        var discount=v.discount;
        if (discount==0){
          subtotal=v.price*v.qty;
          total+=subtotal;
          result+=`<tr>
          <td>${j}</td>
          <td>${v.name}</td>
          <td><img src="${v.photo}" width = "100"></td>
          <td>${v.price}</td>
          <td><i class="fas fa-plus-circle fa-2x" style='color:blue' data-id=${v.id}></i>
          <span class='badge badge-success' style='font-size:20px'>${v.qty}</span>
          <i class="fas fa-minus-circle fa-2x" style='color:red' data-id=${v.id}></i></td>
          <td>${subtotal}</td>
          <td><button class="btn btn-danger clear" data-id="${v.id}">X</button></td>
          </tr>`
          j++;

        }else{
        //console.log(discount);
        disc=price-(price*(discount/100));
        subtotal=disc*v.qty;
        total+=subtotal;
        result+=`<tr>
        <td>${j}</td>
        <td>${v.name}</td>
        <td><img src="${v.photo}" width = "100"></td>
        <td>${v.price}<br>Discount:${discount}%</td>
        <td><i class="fas fa-plus-circle fa-2x" style='color:blue' data-id=${v.id}></i>
        <span class='badge badge-success' style='font-size:20px'>${v.qty}</span>
        <i class="fas fa-minus-circle fa-2x" style='color:red' data-id=${v.id}></i></td>
        <td>${subtotal}</td>
        <td><button class="btn btn-danger clear" data-id="${v.id}">X</button></td>
        </tr>`
        j++;
      }
    })

      result+=`<tr>
      <td colspan="5">Total:</td>
      <td colspan="2">${total}</td>
      </tr>`;
      $("#total_price").html(total);

    }else {
      result+='Cart is Empty';
    }
    $("#tbody").html(result);

  }

  $("#tbody").on('click','.fa-plus-circle',function () {
    var id=$(this).data('id');
          //alert (id);
          var mycart=localStorage.getItem('newcart');
          var newcart=JSON.parse(mycart);
          $.each(newcart,function (i,v){
            if (v.id==id) {
              v.qty++;
            }

          })
          localStorage.setItem('newcart',JSON.stringify(newcart));
          show_cart();
          update_cart_count();
        })
  $("#tbody").on('click','.fa-minus-circle',function () {

    var myid=$(this).data('id');
          //console.log(id);
          var mycart=localStorage.getItem('newcart');
          var newcart=JSON.parse(mycart);
          $.each(newcart,function (i,v){
            if (v) {
              if (v.id==myid) {
                if (v.qty==1) {
                  var ans=confirm('Are you sure to delete?');
                  if (ans) {
                    newcart.splice(i,1);
                    $("table").html('');
                    $(".no_item").show();
                  }
                }else{
                  v.qty--;

                }

              }
            }


          })
          localStorage.setItem('newcart',JSON.stringify(newcart));
          show_cart();
          update_cart_count();

        }) 




  function update_cart_count() {
   var mycart=localStorage.getItem('newcart');
   if (mycart) {
    var newcart=JSON.parse(mycart);
    if (newcart.length) {
      var total=0;
      $.each(newcart,function (i,v) {
                //console.log(i,v);
                total+=v.qty;
              })
      $(".cart_noti").html(total);
    }else{
      $(".cart_noti").html(0);
    }
  }else{
    $(".cart_noti").html(0);
  }
}
$('#tbody').on('click','.clear',function () {
  var myid=$(this).data('id');
          //console.log(myid);
          var mycart=localStorage.getItem('newcart');
          var newcart=JSON.parse(mycart);
          if (newcart.length!=1) {
            $.each(newcart,function (i,v){
              if (v) {
                if (v.id==myid) {

                  var ans=confirm('Are you sure to delete?');
                  if (ans) {
                    newcart.splice(i,1);
                  }
                }
              }

            })
          }else{
            $.each(newcart,function (i,v) {
              if (v) {
                if (v.id==myid) {
                  var ans=confirm('Are you sure to delete?');
                  if (ans) {
                    newcart.splice(i,1);
                  }
                }
              }
            })
            $('table').html('');
            $(".no_item").show();
          }
          localStorage.setItem('newcart',JSON.stringify(newcart));
          show_cart();
          update_cart_count();
        })
$('.buy_now').on('click',function () {
  var notes=$('#notes').val();
  //var total=$('.total').val();
  var shopString=localStorage.getItem("newcart");
  if(shopString){
    $.post('/orders',{shop_data:shopString,notes:notes},function (response) {
      if (response) {

        //alert(response);
        localStorage.clear();
        show_cart();
        location.href="/";
      }
    })
  }
})
})