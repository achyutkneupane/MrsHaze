import axios from 'axios';
import React, { Component } from 'react'

export class Footer extends Component {

    constructor(props) {
        super(props)
        this.state = {
          email: []
        };
      }
      
    handleChange = event => {
        this.setState({ email: event.target.value });
    }

    handleSubmit = event => {
        event.preventDefault();
        const email = {
            value: this.state.email
        };
        axios.post(`http://127.0.0.1:8000/api/subscribe`, { email })
             .then(res => {
                console.log(res.data);
             })
             .catch((error) => {
                 console.log("Error");
             })
    }

    render() {
        return (
            <div className="items-center w-full mx-auto">
                <footer className="text-gray-700 transition duration-500 ease-in-out transform bg-gray-100 border rounded-lg ">
                    <div className="container flex flex-col flex-wrap p-8 mx-auto md:items-center lg:items-start md:flex-row md:flex-no-wrap ">
                        <div className="flex flex-col-reverse justify-between w-full mt-8 text-left md:flex-row md:mt-0">
                            <div className="flex flex-col justify-center w-full pr-4 md:w-1/5 md:order-1">
                                <h2 className="mx-auto mb-6 text-6xl leading-snug tracking-tighter text-black md:mx-0 title-font logoText">
                                    Mrs. Haze
                                </h2>
                                <span className="inline-flex justify-center md:justify-start sm:mb-12">
                                    <a className="text-turq hover:text-black">
                                        <svg fill="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" className="w-5 h-5" viewBox="0 0 24 24">
                                            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                                        </svg>
                                    </a>
                                    <a className="ml-3 text-turq hover:text-black">
                                        <svg fill="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" className="w-5 h-5" viewBox="0 0 24 24">
                                            <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a className="ml-3 text-turq hover:text-black">
                                        <svg fill="none" stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" className="w-5 h-5" viewBox="0 0 24 24">
                                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                                            <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                                        </svg>
                                    </a>
                                    <a className="ml-3 text-turq hover:text-black">
                                        <svg fill="currentColor" stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="0" className="w-5 h-5" viewBox="0 0 24 24">
                                            <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                                            </path>
                                            <circle cx="4" cy="4" r="2" stroke="none"></circle>
                                        </svg>
                                    </a>
                                </span>
                                <h2 className="mt-4 mb-4 text-xs font-semibold tracking-widest text-center text-black uppercase md:mt-1 title-font md:text-left">© <br />All rights reserved.</h2>
                            </div>
                            <div className="flex flex-col justify-center w-full px-8 text-center align-center md:w-3/5 md:order-2">
                                <form onSubmit={this.handleSubmit} className='flex flex-col items-center justify-center w-full text-center md:flex-row align-center'>
                                    <input type="text" placeholder='Enter your e-mail to subscribe to Newsletter' className="w-full px-4 py-2 mx-auto mb-4 text-base text-black transition ease-in-out transform bg-white rounded-lg md:mr-4 md:w-4/5 duration-650 focus:outline-none focus:border-turq sm:mb-0 focus:bg-white focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2" name='email' onChange={this.handleChange} />
                                    <button className="flex items-center justify-center px-6 py-2 font-semibold text-center text-white transition duration-500 ease-in-out transform bg-black rounded-lg md:w-1/5 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">Subscribe</button>
                                </form>
                            </div>
                            <div className="w-full px-8 md:w-1/5 md:order-3">
                                <h1 className="hidden mb-8 text-xs font-semibold tracking-widest text-black uppercase title-font md:block"> Links </h1>
                                <nav className="flex flex-row mb-10 list-none justify-evenly md:space-y-4 md:flex-col">
                                    <li>
                                        <a className="mr-1 text-sm transition duration-500 ease-in-out transform rounded-sm text-turq focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">Home</a>
                                    </li>
                                    <li>
                                        <a className="mr-1 text-sm transition duration-500 ease-in-out transform rounded-sm text-turq focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">About</a>
                                    </li>
                                    <li>
                                        <a className="mr-1 text-sm transition duration-500 ease-in-out transform rounded-sm text-turq focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">Songs</a>
                                    </li>
                                </nav>
                            </div>
                        </div>
                        <h5 className='w-full pt-4 font-bold text-center uppercase'>
                            Developed by <a href='https://www.linkedin.com/in/achyutkneupane/' target='_blank'>Achyut</a>
                        </h5>
                    </div>
                </footer>
            </div>
        )
    }
}

export default Footer
