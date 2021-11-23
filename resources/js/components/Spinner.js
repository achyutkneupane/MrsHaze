import React, { Component } from 'react'
import Loader from '../../../public/images/Loader.svg';

export class Spinner extends Component {
    render() {
        return (
            <div className='flex items-center justify-center w-screen h-screen bg-turq flxed'>
                <img src={Loader}></img>
            </div>
        )
    }
}

export default Spinner
