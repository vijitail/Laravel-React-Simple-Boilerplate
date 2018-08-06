import React, { Component } from 'react';

export default class Home extends Component {
    render() {
        return (
            <div className="container" style={{marginTop: "120px"}}>
                <div className="row justify-content-center align-items-center" >
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Home Component</div>

                            <div className="card-body">
                                Hello, this is the Home Component
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}
