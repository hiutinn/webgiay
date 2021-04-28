@extends('frontend.layouts.main')

@section('content')
    <h2 style="margin: 4rem;text-align: center"><u>Sản Phẩm</u></h2>
    <div class="rsidebar span_1_of_left">
        <section class="sky-form">
            <h4>Danh Mục</h4>
            <div class="row scroll-pane" style="outline:none;
	padding: 20px;
	overflow: auto;">
                <ul>
                    <li>
                        <label class="checkbox">
                            <input type="checkbox" name="checkbox" checked="">
                            <i></i>Tất cả
                        </label>
                    </li>
                    <li>
                        <label class="checkbox">
                            <input type="checkbox" name="checkbox">
                            <i></i>Nike
                        </label>
                        <ul style="margin-left: 1rem">
                            <label class="checkbox">
                                <input type="checkbox" name="checkbox">
                                <i></i>Air Force
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" name="checkbox">
                                <i></i>Jordan
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" name="checkbox">
                                <i></i>SB Dunk
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" name="checkbox">
                                <i></i>Air Max
                            </label>
                        </ul>
                    </li>
                    <li>
                        <label class="checkbox">
                            <input type="checkbox" name="checkbox">
                            <i></i>Converse
                        </label>
                        <ul style="margin-left: 1rem">
                            <label class="checkbox">
                                <input type="checkbox" name="checkbox">
                                <i></i>1970s
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" name="checkbox">
                                <i></i>CDG
                            </label>
                        </ul>
                    </li>
                    <li>
                        <label class="checkbox">
                            <input type="checkbox" name="checkbox">
                            <i></i>Vans
                        </label>
                    </li>
                </ul>
            </div>
        </section>
    </div>
    <div class="cont span_2_of_3" style="margin-bottom: 6rem">
        <div class="mens-toolbar">
            <div class="sort">
                <div class="sort-by">
                    <label>Sort By</label>
                    <select>
                        <option value="">
                            Popularity
                        </option>
                        <option value="">
                            Price : High to Low
                        </option>
                        <option value="">
                            Price : Low to High
                        </option>
                    </select>
                    <a href=""><img src="/frontend/images/arrow2.gif" alt="" class="v-middle"></a>
                </div>
            </div>
            <div class="pager">
                <div class="limiter visible-desktop">
                    <label>Show</label>
                    <select>
                        <option value="" selected="selected">
                            9
                        </option>
                        <option value="">
                            15
                        </option>
                        <option value="">
                            30
                        </option>
                    </select> per page
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="box1">
            <div class="col_1_of_single1 span_1_of_single1"><a href="single.html">
                    <div class="view1 view-fifth1">
                        <div class="top_box">
                            <h3 class="m_1">Lorem ipsum dolor sit amet</h3>
                            <p class="m_2">Lorem ipsum</p>
                            <div class="grid_img">
                                <div class="css3"><img src="/frontend/images/pic11.jpg" alt=""/></div>
                                <div class="mask1">
                                    <div class="info">Quick View</div>
                                </div>
                            </div>
                            <div class="price">£480</div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </a></div>
            <div class="col_1_of_single1 span_1_of_single1"><a href="single.html">
                    <div class="view1 view-fifth1">
                        <div class="top_box">
                            <h3 class="m_1">Lorem ipsum dolor sit amet</h3>
                            <p class="m_2">Lorem ipsum</p>
                            <div class="grid_img">
                                <div class="css3"><img src="/frontend/images/pic10.jpg" alt=""/></div>
                                <div class="mask1">
                                    <div class="info">Quick View</div>
                                </div>
                            </div>
                            <div class="price">£480</div>
                        </div>
                    </div>

                    <div class="clear"></div>
                </a></div>
            <div class="col_1_of_single1 span_1_of_single1"><a href="single.html">
                    <div class="view1 view-fifth1">
                        <div class="top_box">
                            <h3 class="m_1">Lorem ipsum dolor sit amet</h3>
                            <p class="m_2">Lorem ipsum</p>
                            <div class="grid_img">
                                <div class="css3"><img src="/frontend/images/pic9.jpg" alt=""/></div>
                                <div class="mask1">
                                    <div class="info">Quick View</div>
                                </div>
                            </div>
                            <div class="price" style="text-decoration: none;color: goldenrod">£480</div>
                        </div>
                    </div>

                    <div class="clear"></div>
                </a></div>
            <div class="clear"></div>
        </div>
        <div class="box1">
            <div class="col_1_of_single1 span_1_of_single1"><a href="single.html">
                    <div class="view1 view-fifth1">
                        <div class="top_box">
                            <h3 class="m_1">Lorem ipsum dolor sit amet</h3>
                            <p class="m_2">Lorem ipsum</p>
                            <div class="grid_img">
                                <div class="css3"><img src="/frontend/images/pic3.jpg" alt=""/></div>
                                <div class="mask1">
                                    <div class="info">Quick View</div>
                                </div>
                            </div>
                            <div class="price">£480</div>
                        </div>
                    </div>

                    <div class="clear"></div>
                </a></div>
            <div class="col_1_of_single1 span_1_of_single1"><a href="single.html">
                    <div class="view1 view-fifth1">
                        <div class="top_box">
                            <h3 class="m_1">Lorem ipsum dolor sit amet</h3>
                            <p class="m_2">Lorem ipsum</p>
                            <div class="grid_img">
                                <div class="css3"><img src="/frontend/images/pic4.jpg" alt=""/></div>
                                <div class="mask1">
                                    <div class="info">Quick View</div>
                                </div>
                            </div>
                            <div class="price">£480</div>
                        </div>
                    </div>

                    <div class="clear"></div>
                </a></div>
            <div class="col_1_of_single1 span_1_of_single1"><a href="single.html">
                    <div class="view1 view-fifth1">
                        <div class="top_box">
                            <h3 class="m_1">Lorem ipsum dolor sit amet</h3>
                            <p class="m_2">Lorem ipsum</p>
                            <div class="grid_img">
                                <div class="css3"><img src="/frontend/images/pic5.jpg" alt=""/></div>
                                <div class="mask1">
                                    <div class="info">Quick View</div>
                                </div>
                            </div>
                            <div class="price">£480</div>
                        </div>
                    </div>

                    <div class="clear"></div>
                </a></div>
            <div class="clear"></div>
        </div>
        <div class="box1">
            <div class="col_1_of_single1 span_1_of_single1"><a href="single.html">
                    <div class="view1 view-fifth1">
                        <div class="top_box">
                            <h3 class="m_1">Lorem ipsum dolor sit amet</h3>
                            <p class="m_2">Lorem ipsum</p>
                            <div class="grid_img">
                                <div class="css3"><img src="/frontend/images/pic6.jpg" alt=""/></div>
                                <div class="mask1">
                                    <div class="info">Quick View</div>
                                </div>
                            </div>
                            <div class="price">£480</div>
                        </div>
                    </div>

                    <div class="clear"></div>
                </a></div>
            <div class="col_1_of_single1 span_1_of_single1"><a href="single.html">
                    <div class="view1 view-fifth1">
                        <div class="top_box">
                            <h3 class="m_1">Lorem ipsum dolor sit amet</h3>
                            <p class="m_2">Lorem ipsum</p>
                            <div class="grid_img">
                                <div class="css3"><img src="/frontend/images/pic7.jpg" alt=""/></div>
                                <div class="mask1">
                                    <div class="info">Quick View</div>
                                </div>
                            </div>
                            <div class="price">£480</div>
                        </div>
                    </div>

                    <div class="clear"></div>
                </a></div>
            <div class="col_1_of_single1 span_1_of_single1"><a href="single.html">
                    <div class="view1 view-fifth1">
                        <div class="top_box">
                            <h3 class="m_1">Lorem ipsum dolor sit amet</h3>
                            <p class="m_2">Lorem ipsum</p>
                            <div class="grid_img">
                                <div class="css3"><img src="/frontend/images/pic8.jpg" alt=""/></div>
                                <div class="mask1">
                                    <div class="info">Quick View</div>
                                </div>
                            </div>
                            <div class="price">£480</div>
                        </div>
                    </div>

                    <div class="clear"></div>
                </a></div>
            <div class="clear"></div>
        </div>
        <div class="box1">
            <div class="col_1_of_single1 span_1_of_single1"><a href="single.html">
                    <div class="view1 view-fifth1">
                        <div class="top_box">
                            <h3 class="m_1">Lorem ipsum dolor sit amet</h3>
                            <p class="m_2">Lorem ipsum</p>
                            <div class="grid_img">
                                <div class="css3"><img src="/frontend/images/pic2.jpg" alt=""/></div>
                                <div class="mask1">
                                    <div class="info">Quick View</div>
                                </div>
                            </div>
                            <div class="price">£480</div>
                        </div>
                    </div>

                    <div class="clear"></div>
                </a></div>
            <div class="col_1_of_single1 span_1_of_single1"><a href="single.html">
                    <div class="view1 view-fifth1">
                        <div class="top_box">
                            <h3 class="m_1">Lorem ipsum dolor sit amet</h3>
                            <p class="m_2">Lorem ipsum</p>
                            <div class="grid_img">
                                <div class="css3"><img src="/frontend/images/pic1.jpg" alt=""/></div>
                                <div class="mask1">
                                    <div class="info">Quick View</div>
                                </div>
                            </div>
                            <div class="price">£480</div>
                        </div>
                    </div>

                    <div class="clear"></div>
                </a></div>
            <div class="col_1_of_single1 span_1_of_single1"><a href="single.html">
                    <div class="view1 view-fifth1">
                        <div class="top_box">
                            <h3 class="m_1">Lorem ipsum dolor sit amet</h3>
                            <p class="m_2">Lorem ipsum</p>
                            <div class="grid_img">
                                <div class="css3"><img src="/frontend/images/pic.jpg" alt=""/></div>
                                <div class="mask1">
                                    <div class="info">Quick View</div>
                                </div>
                            </div>
                            <div class="price">£480</div>
                        </div>
                    </div>

                    <div class="clear"></div>
                </a></div>
            <div class="clear"></div>
        </div>
        <nav aria-label="Page navigation example" style="margin: 2rem">
            <ul class="pagination justify-content-end">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="clear"></div>
@endsection
