<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package categitau
 */

get_header();
?>
<!-- Blog -->
<section class="content-section" id="portfolio">
    <div class="container">
        <div class="content-section-heading text-center">
        <h5 class="m-3"> 404 </h5>
        </div>
        <div class="row mb-0">
            <div class="col-lg-5 col-md-5 col-sm-12 mx-auto">
                <div class="mb-5">
                    <form action="#">
                        <div class="select-box">
                            <label for="select-box1" class="label select-box1"><span class="label-desc"> Categories </span> </label>
                            <select id="select-box1" class="select">
                            <option value="Choice 1"> All </option>
                            <option value="Choice 3"> Machine Learning</option>
                            <option value="Choice 2"> Data Science</option>
                            <option value="Choice 3"> Python </option>
                            <option value="Choice 3"> Supervised Learning </option>
                            <option value="Choice 3"> Tutorials </option>
                            <option value="Choice 3"> Research </option>
                            <option value="Choice 3"> Events & MeetUps </option>
                            </select>
                            
                        </div>
                            
                    </form>  
                </div>
            </div> <!-- End category dropdown -->
            <div class="col-lg-5 col-md-5 col-sm-12 mx-auto">
                <div id="top-search" class="mb-5">
                    <div class="header-right">
                        <form class="rst-search-form open rst-fixed" action="/post.html">
                            <input placeholder="Search here..." type="text">
                            <button>
                                <i name="q" class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>		
        </div>
		<div class="row">
			<article>
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 mx-auto">
							<h4  class="col-lg-12 col-md-12" >
								Sorry nothing was found matching your criteria.
							</h4>
						</div>
					</div>
				</div>
			</article>
		</div>
    </div>
</section>
<br>
<?php
get_footer();
