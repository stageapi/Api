import { HydraAdmin } from '@api-platform/admin';
import React from 'react';
import './App.css';


export default () => <HydraAdmin entrypoint="http://127.0.0.1:8000/api"/>;
