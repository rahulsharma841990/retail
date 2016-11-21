<div id="menu-bar" style="margin-top:0%; background-color:#A0CAFB;">
            <ul class="main-menu">
                <li>
                    File
                    <ul>

                        <li>
                            New
                            <ul>
                                <li><a href="http://www.google.com/" target="_blank">Google search</a></li>
                                <li class="separator"></li>
                                <li><a href="/#!/new-document">Product</a></li>
                                <li><a href="/#!/new-document">Document</a></li>
                                <li><a href="/#!/new-client">Client</a></li>
                            </ul>
                        </li>
                        <li class="separator"></li>
                        <li class="icon save"><a href="javascript:void(0)">Save<span>Ctrl+S</span></a></li>
                        <li class="separator"></li>
                        <li class="disabled"><a href="/#!/import">Import</a></li>
                        <li>Export</li>
                        <li><a href="<?=base_url()?>index.php/dashboard">Go To Dashboard</a></li>
                        <li class="separator"></li>
                        <li class="icon print"><a href="javascript:void(0)">Print<span>Ctrl+P</span></a></li>
                        <li class="separator"></li>
                        <li><a href="<?=url()?>index.php/login/logout">Logout</a></li>
                    </ul>
                </li>
            <?php
                if($this->session->userdata('usertype') == 'gd'):
            ?>

                <li>
                    Purchase Management
                    <ul>
                        <li><a href="<?=url()?>index.php/purchase/add" class="submitPop">Add Purchase</a>
                            <!-- <ul>
                                <li>All</li>
                                <li class="separator"></li>
                                <li>Unfinished</li>
                                <li>Closed</li>
                            </ul> -->
                        </li>
                        <li><a href="<?=base_url()?>index.php/purchase/purchaseList" class="submitPop">Purchase List</a></li>
                        <li><a href="<?=base_url()?>index.php/purchase/uploadpurchase" class="submitPop">Upload Purchase List</a></li>
                        <li class="separator"></li>
						<li>
							Vendor
							<ul>
								<li>
									<a href="<?=base_url()?>index.php/vendor/index/add" class="submitPop">Add Vendor</a>
									<!-- <ul>
                                        <li>
                                            Third level menu item
                                        </li>
                                        <li>
                                        Third level
                                        <ul>
                                                <li>
                                                    Forth level menu item 1
                                                </li>
                                                <li>
                                                    Forth level menu item 2
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="separator"></li>
                                        <li>Another third level menu item</li>
                                    </ul> -->
								</li>
								<li>
									<a href="<?=base_url()?>index.php/vendor/" class="submitPop">Vendors List</a>
								</li>
							</ul>
						</li>
                        <li class="separator"></li>
                        <li><a href="<?=base_url()?>index.php/purchase/categories" class="submitPop">Categories</a></li>
                        <li class="separator"></li>
                        <li><a href="javascript:;" onclick="window.open('<?=base_url()?>index.php/features/updateProdDetails')">Update Details</a></li>
                    </ul>
                </li>

                <li>
                    Store Management
                    <ul>
						<li>
                            Add New Store
                        </li>
                        <li>
							<a href="<?=base_url()?>index.php/stores/index" class="submitPop">List All Stores</a>
						</li>
                        <li class="separator"></li>
                        <li>
                            Coordinator
                            <ul>
                                <li>
                                    <a href="<?=base_url()?>index.php/coordinator/coordinator_list/add" class="submitPop">Add New Coordinator</a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>index.php/coordinator/coordinator_list" class="submitPop">List All Coordinators</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    Transfer
                    <ul>
                        <li><a href="<?=base_url()?>index.php/stores/transferStock" class="submitPop">Stock Transfer</a></li>
                        <li><a href="<?=base_url()?>index.php/stores/transferlist" class="submitPop">List Transfer's</a></li>
                    </ul>
                </li>
                <?php
                    endif;
                ?>
                <li>
                    Sale
                    <ul>
                        <?php
                            if($this->session->userdata('usertype') != 'gd'):
                        ?>
                        <li><a href="<?=base_url()?>index.php/rps/saleProducts" class="submitPop">Sale Products</a></li>
                        <?php
                            endif;
                        ?>
                        <?php
                            if($this->session->userdata('usertype') == 'gd'):
                        ?>
                        <li>
                            Members
                            <ul>
                                <li><a href="<?=base_url()?>index.php/members/MembersList/add" class="submitPop">Add New Member</a></li>
                                <li><a href="<?=base_url()?>index.php/members/MembersList" class="submitPop">Members List</a></li>
                            </ul>
                        </li>
                        <li>
                            Store Sales
                            <ul>
                                <li><a href="<?=base_url()?>index.php/members/MembersList/add" class="submitPop">View Store Sale</a></li>
                            </ul>
                        </li>
                        <?php
                            endif;
                        ?>
                        <?php
                            if($this->session->userdata('usertype') != 'gd'):
                        ?>
                        <li>
                            Manage Store Stock
                            <ul>
                                <li><a href="<?=base_url()?>index.php/storestock/stockmgmt" class="submitPop">Stock List</a></li>
                                <li><a href="<?=base_url()?>index.php/storestock/uploadStock" class="submitPop">Upload Stock</a></li>
                            </ul>
                        </li>
                        <?php
                            endif;
                        ?>
                    </ul>
                </li>
                <?php
                    if($this->session->userdata('usertype') != 'gd'):
                ?>
                <li>
                    Sale Report
                    <ul>
                        <li>Today's Sale</li>
                        <li><a href="<?=base_url()?>index.php/reports/salereport/saleList">Sale Report By Date</a></li>
                    </ul>
                </li>
                <?php
                    endif;
                ?>
                <li>
                    Orders
                    <ul>
                        <?php
                            if($this->session->userdata('usertype') != 'gd'):
                        ?>
                        <li><a href="<?=base_url()?>index.php/placeorder/placeorder" class="submitPop">Place Order</a></li>
                        <li><a href="<?=base_url()?>index.php/placeorder/deposit" class="submitPop">Submit Deposits</a></li>
                        <?php
                            endif;
                        ?>
                        <?php
                            if($this->session->userdata('usertype') == 'gd'):
                        ?>
                        <li><a href="<?=base_url()?>index.php/placeorder/list_orders" class="submitPop">Orders List</a></li>
                        <?php
                            endif;
                        ?>
                    </ul>
                </li>
                <?php
                    if($this->session->userdata('usertype') == 'gd'):
                ?>
                <li>
                    Reports
                    <ul>
                        <li><a href="">Sale Report</a></li>
                        <li class="separator"></li>
                        <li><a href="<?=base_url()?>index.php/storepercent/precent">Sale Percentage</a></li>
                    </ul>
                </li>
                <li>
                    Payout
                    <ul>
                        <li><a href="<?=base_url()?>index.php/payout/genpayout">Generate Payout</a></li>
                        <li><a href="">Payout List</a></li>
                    </ul>
                </li>
                <?php
                    endif;
                ?>
                <!-- <li>
                    Help
                    <ul>
                        <li>Index</li>
                        <li class="separator"></li>
                        <li>Upgrade account</li>
                        <li>Registration</li>
                        <li class="separator"></li>
                        <li>Contact us</li>
                    </ul>
                </li> -->
            </ul><!-- end mainmenu -->        
        </div>

<!-- <script type="text/javascript">
    window.open('/pageaddress.html','winname','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=800,height=350,left=250,top=150,status=1,directories=1,dialog');
</script> -->