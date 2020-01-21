using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using Vuforia;

public class vb_anim : MonoBehaviour, IVirtualButtonEventHandler
{
    public GameObject vbBtnObj;
    public Animator textAni;
    // Start is called before the first frame update
    void Start()
    {
        vbBtnObj = GameObject.Find("mediatheekBTN");
        vbBtnObj.GetComponent<VirtualButtonBehaviour>().RegisterEventHandler(this);
        textAni.GetComponent<Animator>();
    }

    public void OnButtonPressed(VirtualButtonBehaviour vb)
    {
        textAni.Play("popup_animation");
        Debug.Log("BTN PRESSED");
    }

    public void OnButtonReleased(VirtualButtonBehaviour vb) 
    {
        textAni.Play("none");
        Debug.Log("BTN RELEASED");
    }

    // Update is called once per frame
    void Update()
    {
        
    }
}
