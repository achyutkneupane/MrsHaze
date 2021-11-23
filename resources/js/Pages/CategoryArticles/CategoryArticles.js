import axios from 'axios';
import excerptHtml from 'excerpt-html';
import moment from 'moment';
import React, { Component } from 'react'
import { Link } from 'react-router-dom';
import Footer from '../../components/Footer'
import Header from '../../components/Header'
import Spinner from '../../components/Spinner';

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
          console.log(this.state.articles);
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
                                <div className='flex flex-col w-full gap-4 p-4 border md:w-5/6'>
                                    <img src={post.cover} className='object-cover object-center w-full lg:h-96 md:h-36'/>
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
                </div>
            )
        }
    }
}

export default CategoryArticles
