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
        axios.post(`https://mrshaze.me/api/subscribe`, { email })
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
                                    <a href='https://www.facebook.com/moktan.subani' target='_blank' className="text-turq hover:text-black">
                                        <svg fill="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" className="w-5 h-5" viewBox="0 0 24 24">
                                            <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                                        </svg>
                                    </a>
                                    <a href='https://www.instagram.com/subanimoktan/' target='_blank' className="ml-3 text-turq hover:text-black">
                                    <svg className="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path fillRule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clipRule="evenodd"></path>
                                    </svg>
                                    </a>
                                    <a href='https://www.youtube.com/subanimoktan' target='_blank' className="ml-3 text-turq hover:text-black">
                                        <svg fill="none" stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="4" className="w-5 h-5" viewBox="0 0 44 44">
                                            <path d="M20.2838235,29.7208546 L20.2817697,19.3775851 L30.0092421,24.5671906 L20.2838235,29.7208546 Z M41.6409276,17.5856462 C41.6409276,17.5856462 41.2890436,15.0488633 40.2097727,13.9319394 C38.8405739,12.4655276 37.3060444,12.4583393 36.6026186,12.3724221 C31.5649942,12 24.008044,12 24.008044,12 L23.9922983,12 C23.9922983,12 16.4356904,12 11.398066,12.3724221 C10.6939556,12.4583393 9.16045298,12.4655276 7.79091194,13.9319394 C6.71164104,15.0488633 6.36009927,17.5856462 6.36009927,17.5856462 C6.36009927,17.5856462 6,20.5646804 6,23.5437145 L6,26.3365376 C6,29.3152295 6.36009927,32.2946059 6.36009927,32.2946059 C6.36009927,32.2946059 6.71164104,34.8310466 7.79091194,35.9483127 C9.16045298,37.4147246 10.9592378,37.3681718 11.7605614,37.5218644 C14.6406709,37.8042616 24.0001711,37.8915481 24.0001711,37.8915481 C24.0001711,37.8915481 31.5649942,37.8799099 36.6026186,37.5074878 C37.3060444,37.4219129 38.8405739,37.4147246 40.2097727,35.9483127 C41.2890436,34.8310466 41.6409276,32.2946059 41.6409276,32.2946059 C41.6409276,32.2946059 42,29.3152295 42,26.3365376 L42,23.5437145 C42,20.5646804 41.6409276,17.5856462 41.6409276,17.5856462 L41.6409276,17.5856462 Z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a href='mailto:subani.moktan@gmail.com' target='_blank' className="ml-3 text-turq hover:text-black">
                                        <svg xmlns="http://www.w3.org/2000/svg" className="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                        </svg>
                                    </a>
                                </span>
                                <h2 className="mt-4 mb-4 text-xs font-semibold tracking-widest text-center text-black uppercase md:mt-1 title-font md:text-left">© Mrs. Haze<br />All rights reserved.</h2>
                            </div>
                            <div className="flex flex-col justify-center w-full px-8 text-center align-center md:w-3/5 md:order-2">
                                <form onSubmit={this.handleSubmit} className='flex flex-col items-center justify-center w-full text-center md:flex-row align-center'>
                                    <input type="text" placeholder='Enter your e-mail to subscribe to Newsletter' className="w-full px-4 py-2 mx-auto mb-4 text-base text-black transition ease-in-out transform bg-white rounded-lg md:mr-4 md:w-4/5 duration-650 focus:outline-none focus:border-turq sm:mb-0 focus:bg-white focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2" name='email' onChange={this.handleChange} />
                                    <button className="flex items-center justify-center px-6 py-2 font-semibold text-center text-white transition duration-500 ease-in-out transform bg-black rounded-lg md:w-1/5 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">Subscribe</button>
                                </form>
                            </div>
                            {/* <div className="w-full px-8 md:w-1/5 md:order-3">
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
                            </div> */}
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
