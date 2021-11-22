import React, { Component } from 'react';
import axios from 'axios';
import { Link } from 'react-router-dom';

export class Header extends Component {

    constructor(props) {
        super(props)
        this.state = {
          categories: []
        };
      }
    
    componentDidMount() {
        axios.get("https://mrshaze.me/api/categories")
        .then(res => {
          this.setState({
            categories: res.data
          });
        //   console.log(this.state.categories);
        })
        // .catch((error) => {
        //     console.log(error);
        // })
    }
    render() {
        return (
            <div>
                <div className="items-center ">
                    <div className="transition duration-500 ease-in-out transform">
                        <div className="flex flex-col justify-center px-5 pt-5 pb-1 mx-auto md:items-center {{ !request()->routeIs('search') ? 'md:justify-between' : '' }} md:flex-row">
                            <a href="/" className="focus:outline-none">
                                <div className="flex items-center justify-center text-center">
                                    <h2 className='text-5xl font-medium text-center text-black md:ml-5 logoText'>
                                        Mrs. Haze
                                    </h2>
                                </div>
                            </a>
                        </div>
                        {/* <div className="p-5 mt-3 overflow-y-auto border-t whitespace-nowrap scroll-hidden sticky-top"> */}
                        <div className="mt-3 overflow-y-auto whitespace-nowrap scroll-hidden sticky-top">
                            {/* <ul className="flex items-center justify-center list-none">
                            { this.state.categories.map((post,index) => (
                                <li>
                                    <Link to={ '/' }
                                        className="px-4 py-1 mr-1 text-base text-white transition duration-500 ease-in-out transform rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:text-black ">
                                            {post.title}
                                    </Link>
                                </li>
                            )) }
                            </ul> */}
                        </div>
                    </div>
                </div>
            </div>

        )
    }
}

export default Header
