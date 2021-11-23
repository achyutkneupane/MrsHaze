import React, { Component } from 'react'
import { Link } from 'react-router-dom';
import SubaniMoktanMrshaze from '../../../../public/images/Subani-Moktan-mrshaze.png';

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
            </div>
        )
    }
}

export default FourZeroFour
