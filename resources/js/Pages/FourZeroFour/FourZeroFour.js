import React, { Component } from 'react'
import { Helmet } from 'react-helmet';
import { Link } from 'react-router-dom';
import SubaniMoktanMrshaze from '../../../../public/images/Subani-Moktan-mrshaze.png';
import CoverPage from '../../../../public/images/cover-page.jpg';

export class FourZeroFour extends Component {
    render() {
        return (
            <div>
                <div className='w-screen h-screen'>
                    <div className='w-full h-full bg-center bg-no-repeat bg-cover lg:bg-left lg:bg-contain' style={{ backgroundImage: `url(${SubaniMoktanMrshaze})` }}>
                        <div className='flex justify-end w-full h-full bg-opacity-60 bg-turq lg:bg-opacity-0'>
                            <div className='flex flex-col items-center justify-center w-full gap-8 px-4 text-black xl:w-1/2 lg:w-2/5 xl:mx-16 lg:mx-2'>
                                <h1 className='font-bold text-center text-8xl lg:text-9xl'>
                                    404
                                </h1>
                                <h4 className='text-4xl'>
                                    Page Not Found
                                </h4>
                                <div className='text-2xl'>
                                    <Link to='/' className='p-4 text-black bg-white rounded-xl'>
                                        Go To Home Page
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <Helmet>
                        <title>404 Not Found</title>
                        <meta name="title" content="404 Not Found"/>
                        <meta name="description" content="404 Not Found"/>
                        <meta name="keywords" content="Subani Moktan,Mrs. Haze,Mrs. Haze Writes"/>
                        <meta property="article:published_time" content="2021-11-23 00:00:00"/>
                        <meta property="article:section" content="website"/>
                        <meta property="article:author" content="https://www.facebook.com/subani"/>
                        <meta property="article:publisher" content="https://www.facebook.com/moktan.subani"/>
                        <meta property="fb:app_id" content="931301841077172"/>
                        <meta property="fb:pages" content="333706163397393"/>

                        <meta property="og:type" content="website"/>
                        <meta property="og:url" content={window.location.href}/>
                        <meta property="og:title" content="404 Not Found"/>
                        <meta property="og:description" content="404 Not Found"/>
                        <meta property="og:image" content={ CoverPage }/>
                        <meta property="og:site_name" content="Mrs. Haze"/>

                        <meta name="twitter:card" content="summary"/>
                        <meta name="twitter:url" content={window.location.href}/>
                        <meta name="twitter:title" content="404 Not Found"/>
                        <meta name="twitter:description" content="404 Not Found"/>
                        <meta name="twitter:image" content={ CoverPage }/>
                        <meta name="twitter:site" content="@moktansubani"/>
                    </Helmet>
            </div>
        )
    }
}

export default FourZeroFour
