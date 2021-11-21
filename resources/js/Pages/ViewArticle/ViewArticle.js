import React, { Component } from 'react';
import axios from 'axios';
import { BrowserRouter,Link,useParams,withRouter } from 'react-router-dom';
import moment from 'moment';
import ReactHtmlParser from 'html-react-parser';
import Header from '../../components/Header';
import Footer from '../../components/Footer';

export class ViewArticle extends Component {

    constructor(props) {
        super(props)
        this.state = {
          article: [],
          others: [],
          content: ''
        };
    }
    componentDidMount() {
        this.axiosCalls(this.props.match.params.slug);
    }
    componentDidUpdate(prevProps) {
        if(this.props.match.params.slug !== prevProps.match.params.slug) {
            this.axiosCalls(this.props.match.params.slug);
        }
    }
    axiosCalls(newSlug) {
        axios.get("http://127.0.0.1:8000/api/article/"+newSlug)
            .then(res => {
                this.setState({
                    article: res.data,
                    content: res.data.content
                });
            })
            .catch((error) => {
                console.log(error);
            })
        axios.get("http://127.0.0.1:8000/api/articles/without/"+newSlug)
            .then(res => {
                this.setState({
                    others: res.data
                });
            })
            .catch((error) => {
                console.log(error);
            })
        window.scrollTo(0,0);
    }
    render() {
        return (
            <React.Fragment>
                <Header />
                {/* {console.log(this.state.slug)} */}
                <div className='flex justify-center w-screen bg-white'>
                    <div className='flex flex-col items-center justify-center w-full p-8 text-justify lg:w-8/12 sm:w-10/12'>
                        <img src={this.state.article.cover} className='object-cover object-center w-full md:w-5/6 max-h-96' loading='lazy' />
                        <h1 className='pt-5 text-3xl text-center uppercase md:text-5xl text-turq'>{this.state.article.title}</h1>
                        {/* <div className='pt-2 text-2xl text-center'>{ this.state.article.category.title }</div> */}
                        <div className='pb-5 text-lg text-center text-gray-500'>{moment(this.state.article.published_at).fromNow()}</div>
                        <div id='article'>
                            { ReactHtmlParser(this.state.content) }
                        </div>
                    </div>
                </div>
                <div className='flex flex-col items-center w-full gap-8 py-8 bg-white'>
                    <h3 className='w-1/2 text-3xl text-center uppercase md:w-1/3 lg:w-1/6 h3title'>More Articles</h3>
                    <div className='flex flex-col w-full md:flex-row md:flex-wrap md:w-2/3'>
                        { this.state.others.map((post,index) => (
                            <div className='w-full p-2 md:w-1/3' key={post.id+index}>
                                <div className='flex flex-col items-center justify-start w-full h-full gap-2 text-center'>
                                    <img src={post.medium_cover} alt={post.title+' - Mrs. Haze'} loading='lazy' className='object-cover object-center max-h-96' />
                                    <h5 className='text-xl font-bold uppercase'>
                                        <Link to={'/article/'+post.slug} className='text-turq'>{post.title}</Link>
                                    </h5>
                                    <div className='flex flex-row justify-center gap-2'>
                                        <span className='text-gray-600'>{post.category.title}</span>
                                        <span className='text-black'>|</span>
                                        <span className='text-gray-600'>{moment(post.published_at).fromNow()}</span>
                                    </div>
                                </div>
                            </div>
                        )) }
                    </div>
                </div>
                <Footer />
            </React.Fragment>
        )
    }
}

export default withRouter(ViewArticle);