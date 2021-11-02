import React from 'react';
import { Link } from 'react-router-dom';
import SubaniMoktanMrshaze from '../../assets/Subani-Moktan-mrshaze.png';
import facebook from '../../assets/icons/facebook.svg';
import instagram from '../../assets/icons/instagram.svg';
import youtube from '../../assets/icons/youtube.svg';
import email from '../../assets/icons/email.svg';

function Home() {
    return (
        <div className='w-screen h-screen bg-turq'>
            <div className='w-full h-full bg-center bg-no-repeat bg-cover lg:bg-left lg:bg-contain' style={{ backgroundImage: `url(${SubaniMoktanMrshaze})` }}>
                <div className='flex justify-end w-full h-full bg-opacity-60 bg-turq lg:bg-opacity-0'>
                    <div className='flex flex-col items-center justify-center w-full gap-8 px-4 text-black xl:w-1/2 lg:w-2/5 xl:mx-16 lg:mx-2'>
                        <h1 className='text-center text-8xl lg:text-9xl logoText' data-aos="fade-up" data-aos-delay="0" data-aos-duration="1000" data-aos-offset="0">
                            Mrs. Haze
                        </h1>
                        <div className='flex flex-row justify-center' data-aos="fade-up" data-aos-delay="500" data-aos-duration="500" data-aos-offset="0">
                            <a href='https://www.facebook.com/moktan.subani' target='_blank' className='mx-2' style={{ color: `#3b5998` }}><img src={facebook} className='w-12 h-12' /></a>
                            <a href='https://www.instagram.com/subanimoktan/' target='_blank' className='mx-2' style={{ color: `#8a3ab9` }}><img src={instagram} className='w-12 h-12' /></a>
                            <a href='https://www.youtube.com/subanimoktan' target='_blank' className='mx-2 text-danger'><img src={youtube} className='w-12 h-12' /></a>
                            <a href='mailto:subani.moktan@gmail.com' target='_blank' className='mx-2 text-dark'><img src={email} className='w-12 h-12' /></a>
                        </div>
                        {/* <div className="relative flex flex-wrap items-stretch w-full my-2 md:w-3/4" data-aos="fade-up" data-aos-delay="1000" data-aos-duration="500" data-aos-offset="0">
                            <input type="search" className="w-full p-3 text-sm text-gray-700 placeholder-gray-400 bg-white border-0 rounded shadow outline-none relateive focus:outline-none focus:shadow-outline" placeholder="Search for Articles...." />
                            <button className="absolute top-0 right-0 flex items-center justify-center h-full pr-3 text-base font-normal leading-snug text-gray-400 bg-transparent">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M23.111 20.058l-4.977-4.977c.965-1.52 1.523-3.322 1.523-5.251 0-5.42-4.409-9.83-9.829-9.83-5.42 0-9.828 4.41-9.828 9.83s4.408 9.83 9.829 9.83c1.834 0 3.552-.505 5.022-1.383l5.021 5.021c2.144 2.141 5.384-1.096 3.239-3.24zm-20.064-10.228c0-3.739 3.043-6.782 6.782-6.782s6.782 3.042 6.782 6.782-3.043 6.782-6.782 6.782-6.782-3.043-6.782-6.782zm2.01-1.764c1.984-4.599 8.664-4.066 9.922.749-2.534-2.974-6.993-3.294-9.922-.749z"/></svg>
                            </button>
                        </div> */}
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Home;