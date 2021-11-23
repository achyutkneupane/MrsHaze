import React, { Component } from 'react';
import axios from 'axios';
import { BrowserRouter,Link,useParams,withRouter } from 'react-router-dom';
import moment from 'moment';
import ReactHtmlParser from 'html-react-parser';
import Header from '../../components/Header';
import Footer from '../../components/Footer';
import Spinner from '../../components/Spinner';
import { Helmet } from 'react-helmet';

export class ViewArticle extends Component {

    _isMounted = false;
    constructor(props) {
        super(props)
        this.state = {
          article: [],
          others: [],
          content: '',
          category: '',
          loading: false
        };
    }
    componentDidMount() {
        this._isMounted = true;
        this.axiosCalls(this.props.match.params.slug);
    }
    componentDidUpdate(prevProps) {
        if(this.props.match.params.slug !== prevProps.match.params.slug) {
            this.axiosCalls(this.props.match.params.slug);
        }
    }
    componentWillUnmount() {
        this._isMounted = false;
      }
    axiosCalls(newSlug) {
        this.setState({
            loading: true,
        });
        axios.get(window.origin+"/api/article/"+newSlug)
            .then(res => {
                this.setState({
                    article: res.data,
                    content: res.data.content,
                    category: res.data.category,
                    loading: false
                });
            })
            // .catch((error) => {
            //     console.log(error);
            // })
        this.setState({
            loading: true,
        });
        axios.get(window.origin+"/api/articles/without/"+newSlug)
            .then(res => {
                this.setState({
                    others: res.data,
                    loading: false
                });
            })
            // .catch((error) => {
            //     console.log(error);
            // })
        window.scrollTo(0,0);
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
                <React.Fragment>
                    <Header />
                    {/* {console.log(this.state.slug)} */}
                    <div className='flex justify-center w-screen bg-white'>
                        <div className='flex flex-col items-center justify-center w-full p-8 text-justify lg:w-8/12 sm:w-10/12'>
                            <img src={this.state.article.big_cover} className='object-cover object-center w-full md:w-5/6 max-h-96' loading='lazy' />
                            <h1 className='pt-5 text-3xl text-center uppercase md:text-5xl text-turq'>{this.state.article.title}</h1>
                            <div className='pt-2 text-2xl text-center'>
                                <Link to={'/category/'+this.state.category.slug} className="text-black">
                                    { this.state.category.title }
                                </Link>
                            </div>
                            <div className='pb-5 text-lg text-center text-gray-500'>{moment(this.state.article.published_at).fromNow()}</div>
                            <div id='article'>
                                { ReactHtmlParser(this.state.content) }
                            </div>
                        </div>
                    </div>
                    <div className='flex flex-col items-center w-full gap-8 py-8 bg-white'>
                        <h3 className='w-1/2 text-3xl text-center uppercase md:w-1/3 lg:w-1/6 h3title'>More Articles</h3>
                        <div className='flex flex-col justify-center w-full md:flex-row md:flex-wrap md:w-2/3'>
                            { this.state.others.map((post,index) => (
                                <div className='flex justify-center w-full p-2 md:w-1/3' key={post.id+Math.floor(Math.random() * 100)}>
                                    <div className='flex flex-col items-center justify-start w-full h-full gap-2 text-center'>
                                        <img src={post.medium_cover} alt={post.title+' - Mrs. Haze'} loading='lazy' className='object-cover object-center max-h-96' />
                                        <h5 className='text-xl font-bold uppercase'>
                                            <Link to={'/article/'+post.slug} className='text-turq'>{post.title}</Link>
                                        </h5>
                                        <div className='flex flex-row justify-center gap-2'>
                                            <span>
                                                <Link to={'/category/'+post.category.slug} className='text-gray-600'>
                                                    {post.category.title}
                                                </Link>
                                            </span>
                                            <span className='text-black'>|</span>
                                            <span className='text-gray-600'>{moment(post.published_at).fromNow()}</span>
                                        </div>
                                    </div>
                                </div>
                            )) }
                        </div>
                    </div>
                    <Footer />
                    <Helmet>
                        <title>{ this.state.article.title+' - Mrs. Haze' }</title>
                        <meta name="title" content={this.state.article.title+' - Mrs. Haze'} />
                        <meta name="description" content={this.state.article.description}/>
                        <meta name="keywords" content={'Subani Moktan,Mrs. Haze,Mrs. Haze Writes,'+this.state.article.title+','+this.state.category.title}/>
                        <meta property="article:published_time" content={moment(this.state.article.published_at).toISOString()}/>
                        <meta property="article:section" content="article"/>
                        <meta property="article:author" content="https://www.facebook.com/subani"/>
                        <meta property="article:publisher" content="https://www.facebook.com/moktan.subani"/>
                        <meta property="fb:app_id" content="931301841077172"/>
                        <meta property="fb:pages" content="333706163397393"/>

                        <meta property="og:type" content="article"/>
                        <meta property="og:url" content={window.location.href}/>
                        <meta property="og:title" content={this.state.article.title+' - Mrs. Haze'}/>
                        <meta property="og:description" content={this.state.article.description}/>
                        <meta property="og:image" content={this.state.article.cover}/>
                        <meta property="og:site_name" content="Mrs. Haze"/>

                        <meta name="twitter:card" content="summary"/>
                        <meta name="twitter:url" content={window.location.href}/>
                        <meta name="twitter:title" content={this.state.article.title+' - Mrs. Haze'}/>
                        <meta name="twitter:description" content={this.state.article.description}/>
                        <meta name="twitter:image" content={this.state.article.cover}/>
                        <meta name="twitter:site" content="@moktansubani"/>
                    </Helmet>
                </React.Fragment>
            )
        }
    }
}

export default withRouter(ViewArticle);