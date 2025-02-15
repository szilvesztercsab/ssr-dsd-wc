<?php

$myCounter = fn($initialCount) => <<<HTML
<my-counter>
  <template shadowrootmode="open">
    <style>
      @-webkit-keyframes shadow-inset-center {
        0% {
          -webkit-box-shadow: inset 0 0 0 0 rgba(0, 0, 0, 0);
                  box-shadow: inset 0 0 0 0 rgba(0, 0, 0, 0);
        }
        100% {
          -webkit-box-shadow: inset 0 0 14px 0px rgba(0, 0, 0, 0.5);
                  box-shadow: inset 0 0 14px 0px rgba(0, 0, 0, 0.5);
        }
      }
      @keyframes shadow-inset-center {
        0% {
          -webkit-box-shadow: inset 0 0 0 0 rgba(0, 0, 0, 0);
                  box-shadow: inset 0 0 0 0 rgba(0, 0, 0, 0);
        }
        100% {
          -webkit-box-shadow: inset 0 0 14px 0px rgba(0, 0, 0, 0.5);
                  box-shadow: inset 0 0 14px 0px rgba(0, 0, 0, 0.5);
        }
      }
      @-webkit-keyframes flip-horizontal-bottom {
        0% {
          -webkit-transform: rotateX(0deg);
                  transform: rotateX(0deg);
        }
        100% {
          -webkit-transform: rotateX(360deg);
                  transform: rotateX(360deg);
        }
      }
      @keyframes flip-horizontal-bottom {
        0% {
          -webkit-transform: rotateX(0deg);
                  transform: rotateX(0deg);
        }
        100% {
          -webkit-transform: rotateX(360deg);
                  transform: rotateX(360deg);
        }
      }
      div {
        display: flex;
        min-width: 15rem;
        border: 1px solid #f1f1f1;
        border-radius: 2rem;
        justify-content: space-between;
        align-items: center;
        & button {
          font-size: 1.5rem;
          padding: 0.5rem 1rem;
          border: none;
          border-radius: 100%;
          background-color: #f1f1f1;
          cursor: pointer;
        }
        & button:hover {
          background-color: #e1e1e1;
          animation: shadow-inset-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
          -webkit-animation: shadow-inset-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }
        & span {
          font-size: 2rem;
          margin: 0 1rem;
          width: 100%;
          text-align: right;
        }
      }
    </style>
    <div>
      <button>-</button>
      <span>
        <slot></slot>
      </span>
      <button>+</button>
    </div>
  </template>
  {$initialCount}
  <script>
    document.currentScript.parentElement.shadowRoot.querySelectorAll('button').forEach(button => {
      button.addEventListener('click', async (event) => {
        const el = event.target.getRootNode().host;
        setTimeout(() => {
          el.textContent = button.textContent === '+'
            ? parseInt(el.textContent) + 1
            : parseInt(el.textContent) - 1;
        }, 100);
        setTimeout(() => {
          el.shadowRoot.querySelector('span').style = '';
        }, 400);
        el.shadowRoot.querySelector('span').style = `
          animation: flip-horizontal-bottom 0.4s linear both;
          -webkit-animation: flip-horizontal-bottom 0.4s linear both;;
        `;
      });
    });
  </script>
</my-counter>
HTML;
