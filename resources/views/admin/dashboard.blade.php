@extends('admin.layout.master')
@section('title')
admin Dashboard
@endsection
@section('content')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Dashboard
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index-2.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-md-6 xl-50">
                <div class="card o-hidden widget-cards">
                    <div class="bg-warning card-body">
                        <div class="media static-top-widget row">
                            <div class="icons-widgets col-4">
                                <div class="align-self-center text-center"><i data-feather="navigation" class="font-warning"></i></div>
                            </div>
                            <div class="media-body col-8"><span class="m-0">Earnings</span>
                                <h3 class="mb-0">$ <span class="counter">6659</span><small> This Month</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 xl-50">
                <div class="card o-hidden  widget-cards">
                    <div class="bg-secondary card-body">
                        <div class="media static-top-widget row">
                            <div class="icons-widgets col-4">
                                <div class="align-self-center text-center"><i data-feather="box" class="font-secondary"></i></div>
                            </div>
                            <div class="media-body col-8"><span class="m-0">Products</span>
                                <h3 class="mb-0">$ <span class="counter">9856</span><small> This Month</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 xl-50">
                <div class="card o-hidden widget-cards">
                    <div class="bg-primary card-body">
                        <div class="media static-top-widget row">
                            <div class="icons-widgets col-4">
                                <div class="align-self-center text-center"><i data-feather="message-square" class="font-primary"></i></div>
                            </div>
                            <div class="media-body col-8"><span class="m-0">Messages</span>
                                <h3 class="mb-0">$ <span class="counter">893</span><small> This Month</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 xl-50">
                <div class="card o-hidden widget-cards">
                    <div class="bg-danger card-body">
                        <div class="media static-top-widget row">
                            <div class="icons-widgets col-4">
                                <div class="align-self-center text-center"><i data-feather="users" class="font-danger"></i></div>
                            </div>
                            <div class="media-body col-8"><span class="m-0">New Vendors</span>
                                <h3 class="mb-0">$ <span class="counter">45631</span><small> This Month</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 xl-100">
                <div class="card">
                    <div class="card-header">
                        <h5>Latest Orders</h5>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="icofont icofont-simple-left"></i></li>
                                <li><i class="view-html fa fa-code"></i></li>
                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                                <li><i class="icofont icofont-error close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="user-status table-responsive latest-order-table">
                            <table class="table table-bordernone">
                                <thead>
                                    <tr>
                                        <th scope="col">Order ID</th>
                                        <th scope="col">Order Total</th>
                                        <th scope="col">Payment Method</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td class="digits">$120.00</td>
                                        <td class="font-danger">Bank Transfers</td>
                                        <td class="digits">On Way</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td class="digits">$90.00</td>
                                        <td class="font-secondary">Ewallets</td>
                                        <td class="digits">Delivered</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td class="digits">$240.00</td>
                                        <td class="font-warning">Cash</td>
                                        <td class="digits">Delivered</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td class="digits">$120.00</td>
                                        <td class="font-primary">Direct Deposit</td>
                                        <td class="digits">$6523</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td class="digits">$50.00</td>
                                        <td class="font-primary">Bank Transfers</td>
                                        <td class="digits">Delivered</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="order.html" class="btn btn-primary">View All Orders</a>
                        </div>
                        
                    </div>
                </div>
            </div>
          
           
           
            <div class="col-xl-6 xl-100">
                <div class="card height-equal">
                    <div class="card-header">
                        <h5>Goods return</h5>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="icofont icofont-simple-left"></i></li>
                                <li><i class="view-html fa fa-code"></i></li>
                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                                <li><i class="icofont icofont-error close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="user-status table-responsive products-table">
                            <table class="table table-bordernone mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Details</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Simply dummy text of the printing</td>
                                        <td class="digits">1</td>
                                        <td class="font-primary">Pending</td>
                                        <td class="digits">$6523</td>
                                    </tr>
                                    <tr>
                                        <td>Long established</td>
                                        <td class="digits">5</td>
                                        <td class="font-secondary">Cancle</td>
                                        <td class="digits">$6523</td>
                                    </tr>
                                    <tr>
                                        <td>sometimes by accident</td>
                                        <td class="digits">10</td>
                                        <td class="font-secondary">Cancle</td>
                                        <td class="digits">$6523</td>
                                    </tr>
                                    <tr>
                                        <td>Classical Latin literature</td>
                                        <td class="digits">9</td>
                                        <td class="font-primary">Return</td>
                                        <td class="digits">$6523</td>
                                    </tr>
                                    <tr>
                                        <td>keep the site on the Internet</td>
                                        <td class="digits">8</td>
                                        <td class="font-primary">Pending</td>
                                        <td class="digits">$6523</td>
                                    </tr>
                                    <tr>
                                        <td>Molestiae consequatur</td>
                                        <td class="digits">3</td>
                                        <td class="font-secondary">Cancle</td>
                                        <td class="digits">$6523</td>
                                    </tr>
                                    <tr>
                                        <td>Pain can procure</td>
                                        <td class="digits">8</td>
                                        <td class="font-primary">Return</td>
                                        <td class="digits">$6523</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="code-box-copy">
                            <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head4" title="" data-original-title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                            <pre class=" language-html"><code class=" language-html" id="example-head4">
&lt;div class="user-status table-responsive products-table"&gt;
&lt;table class="table table-bordernone mb-0"&gt;
&lt;thead&gt;
&lt;tr&gt;
    &lt;th scope="col"&gt;Details&lt;/th&gt;
    &lt;th scope="col"&gt;Quantity&lt;/th&gt;
    &lt;th scope="col"&gt;Status&lt;/th&gt;
    &lt;th scope="col"&gt;Price&lt;/th&gt;
&lt;/tr&gt;
&lt;/thead&gt;
&lt;tbody&gt;
&lt;tr&gt;
    &lt;td&gt;Simply dummy text of the printing&lt;/td&gt;
    &lt;td class="digits"&gt;1&lt;/td&gt;
    &lt;td class="font-primary"&gt;Pending&lt;/td&gt;
    &lt;td class="digits"&gt;$6523&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
    &lt;td&gt;Long established&lt;/td&gt;
    &lt;td class="digits"&gt;5&lt;/td&gt;
    &lt;td class="font-secondary"&gt;Cancle&lt;/td&gt;
    &lt;td class="digits"&gt;$6523&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
    &lt;td&gt;sometimes by accident&lt;/td&gt;
    &lt;td class="digits"&gt;10&lt;/td&gt;
    &lt;td class="font-secondary"&gt;Cancle&lt;/td&gt;
    &lt;td class="digits"&gt;$6523&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
    &lt;td&gt;Classical Latin literature&lt;/td&gt;
    &lt;td class="digits"&gt;9&lt;/td&gt;
    &lt;td class="font-primary"&gt;Return&lt;/td&gt;
    &lt;td class="digits"&gt;$6523&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
    &lt;td&gt;keep the site on the Internet&lt;/td&gt;
    &lt;td class="digits"&gt;8&lt;/td&gt;
    &lt;td class="font-primary"&gt;Pending&lt;/td&gt;
    &lt;td class="digits"&gt;$6523&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
    &lt;td&gt;Molestiae consequatur&lt;/td&gt;
    &lt;td class="digits"&gt;3&lt;/td&gt;
    &lt;td class="font-secondary"&gt;Cancle&lt;/td&gt;
    &lt;td class="digits"&gt;$6523&lt;/td&gt;
&lt;/tr&gt;
&lt;tr&gt;
    &lt;td&gt;Pain can procure&lt;/td&gt;
    &lt;td class="digits"&gt;8&lt;/td&gt;
    &lt;td class="font-primary"&gt;Return&lt;/td&gt;
    &lt;td class="digits"&gt;$6523&lt;/td&gt;
&lt;/tr&gt;
&lt;/tbody&gt;
&lt;/table&gt;
&lt;/div&gt;
                        </code></pre>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 xl-100">
                <div class="card height-equal">
                    <div class="card-header">
                        <h5>Empolyee Status</h5>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="icofont icofont-simple-left"></i></li>
                                <li><i class="view-html fa fa-code"></i></li>
                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                                <li><i class="icofont icofont-error close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="user-status table-responsive products-table">
                            <table class="table table-bordernone mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Designation</th>
                                        <th scope="col">Skill Level</th>
                                        <th scope="col">Experience</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="bd-t-none u-s-tb">
                                            <div class="align-middle image-sm-size"><img class="img-radius align-top m-r-15 rounded-circle blur-up lazyloaded" src="../assets/images/dashboard/user2.jpg" alt="" data-original-title="" title="">
                                                <div class="d-inline-block">
                                                    <h6>John Deo <span class="text-muted digits">(14+ Online)</span></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Designer</td>
                                        <td>
                                            <div class="progress-showcase">
                                                <div class="progress" style="height: 8px;">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="digits">2 Year</td>
                                    </tr>
                                    <tr>
                                        <td class="bd-t-none u-s-tb">
                                            <div class="align-middle image-sm-size"><img class="img-radius align-top m-r-15 rounded-circle blur-up lazyloaded" src="../assets/images/dashboard/user1.jpg" alt="" data-original-title="" title="">
                                                <div class="d-inline-block">
                                                    <h6>Holio Mako <span class="text-muted digits">(250+ Online)</span></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Developer</td>
                                        <td>
                                            <div class="progress-showcase">
                                                <div class="progress" style="height: 8px;">
                                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 70%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="digits">3 Year</td>
                                    </tr>
                                    <tr>
                                        <td class="bd-t-none u-s-tb">
                                            <div class="align-middle image-sm-size"><img class="img-radius align-top m-r-15 rounded-circle blur-up lazyloaded" src="../assets/images/dashboard/man.png" alt="" data-original-title="" title="">
                                                <div class="d-inline-block">
                                                    <h6>Mohsib lara<span class="text-muted digits">(99+ Online)</span></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Tester</td>
                                        <td>
                                            <div class="progress-showcase">
                                                <div class="progress" style="height: 8px;">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="digits">5 Month</td>
                                    </tr>
                                    <tr>
                                        <td class="bd-t-none u-s-tb">
                                            <div class="align-middle image-sm-size"><img class="img-radius align-top m-r-15 rounded-circle blur-up lazyloaded" src="../assets/images/dashboard/user.png" alt="" data-original-title="" title="">
                                                <div class="d-inline-block">
                                                    <h6>Hileri Soli <span class="text-muted digits">(150+ Online)</span></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Designer</td>
                                        <td>
                                            <div class="progress-showcase">
                                                <div class="progress" style="height: 8px;">
                                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 30%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="digits">3 Month</td>
                                    </tr>
                                    <tr>
                                        <td class="bd-t-none u-s-tb">
                                            <div class="align-middle image-sm-size"><img class="img-radius align-top m-r-15 rounded-circle blur-up lazyloaded" src="../assets/images/dashboard/designer.jpg" alt="" data-original-title="" title="">
                                                <div class="d-inline-block">
                                                    <h6>Pusiz bia <span class="text-muted digits">(14+ Online)</span></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Designer</td>
                                        <td>
                                            <div class="progress-showcase">
                                                <div class="progress" style="height: 8px;">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 90%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="digits">5 Year</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="code-box-copy">
                            <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head5" title="" data-original-title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                            
                        </div>
                    </div>
                </div>
            </div>
        

        </div>
    </div>
    <!-- Container-fluid Ends-->

</div>
@endsection