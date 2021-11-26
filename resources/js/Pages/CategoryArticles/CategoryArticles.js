import axios from 'axios';
import excerptHtml from 'excerpt-html';
import moment from 'moment';
import React, { Component } from 'react'
import { Helmet } from 'react-helmet';
import { Link } from 'react-router-dom';
import Footer from '../../components/Footer'
import Header from '../../components/Header'
import Spinner from '../../components/Spinner';
import CoverPage from '../../../../public/images/cover-page.jpg';

export class CategoryArticles extends Component {

    constructor(props) {
        super(props)
        this.state = {
          articles: [],
          category: [],
          title: '',
          loading: false
        };
      }
    
    componentDidMount() {
        this.setState({
            loading: true,
        });
        axios.get(window.origin+"/api/category/"+this.props.match.params.slug)
        .then(res => {
          this.setState({
            category: res.data,
            title: res.data.title,
            articles: res.data.articles,
            loading: false
          });
        })
        .catch((error) => {
            console.log(error);
        })
    }
    
    render() {

        if(this.state.loading)
        {
            return (
                <Spinner />
            );
        }
        else
        {
            return (
                <div>
                    <Header />
                    <div className='flex flex-col w-full gap-8 p-12 bg-white'>
                        <div className='text-4xl text-center uppercase'>
                            { this.state.title }
                        </div>
                        <div className='flex flex-col items-center w-full gap-4'>
                            { this.state.articles.map((post,index) => (
                                <div className='flex flex-col w-full gap-4 p-4 border md:w-2/3'>
                                    <img src={post.big_cover} className='object-cover object-center w-full lg:h-96 md:h-36' loading='lazy'/>
                                    <h3 className='text-4xl font-bold uppercase text-turq'>
                                        <Link to={'/article/'+post.slug}>
                                            {post.title}
                                        </Link>
                                    </h3>
                                    <span className='text-gray-500'>
                                        {moment(post.published_at).fromNow()}
                                    </span>
                                    <div className='w-full'>
                                        {excerptHtml(post.content,{pruneLength: 600,})}
                                    </div>
                                    <div className=''>
                                        <Link to={'/article/'+post.slug} className='text-blue-700'>
                                            Read More...
                                        </Link>
                                    </div>
                                </div>
                            )) }
                        </div>
                    </div>
                    <Footer />
                    <Helmet>
                        <title>{ 'Category: '+this.state.title+' - Mrs. Haze' }</title>
                        <meta name="title" content={'Category: '+this.state.title+' - Mrs. Haze'} />
                        <meta name="description" content={'Here are the articles under category '+this.state.title+' written by Mrs. Haze.'}/>
                        <meta name="keywords" content={'Subani Moktan,Mrs. Haze,Mrs. Haze Writes,'+this.state.title}/>
                        <meta property="article:published_time" content={moment(this.state.category.created_at).toISOString()}/>
                        <meta property="article:section" content="website"/>
                        <meta property="article:author" content="https://www.facebook.com/subani"/>
                        <meta property="article:publisher" content="https://www.facebook.com/moktan.subani"/>
                        <meta property="fb:app_id" content="931301841077172"/>
                        <meta property="fb:pages" content="333706163397393"/>

                        <meta property="og:type" content="website"/>
                        <meta property="og:url" content={window.location.href}/>
                        <meta property="og:title" content={'Category: '+this.state.title+' - Mrs. Haze'}/>
                        <meta property="og:description" content={'Here are the articles under category '+this.state.title+' written by Mrs. Haze.'}/>
                        <meta property="og:image" content={ CoverPage }/>
                        <meta property="og:site_name" content="Mrs. Haze"/>

                        <meta name="twitter:card" content="summary"/>
                        <meta name="twitter:url" content={window.location.href}/>
                        <meta name="twitter:title" content={'Category: '+this.state.title+' - Mrs. Haze'}/>
                        <meta name="twitter:description" content={'Here are the articles under category '+this.state.title+' written by Mrs. Haze.'}/>
                        <meta name="twitter:image" content={ CoverPage }/>
                        <meta name="twitter:site" content="@moktansubani"/>
                    </Helmet>
                </div>
            )
        }
    }
}

export default CategoryArticles
